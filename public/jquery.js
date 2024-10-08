jQuery(function(){
    // ...............Register Request.......
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $(document).on("submit","#loginform",function(e){
        // console.log("Submit event handler triggered");
        e.preventDefault();
        $.ajax({
            url:"../api/loginuser",
            type:"POST",
            dataType:"json",
            data:new FormData(this),
            processData: false,
            contentType: false,
            success:function(data){
                console.log(data);
                localStorage.setItem('auth_token', data.token);
                if(data.role=="admin"){
                    $.ajax({
                        url:"../api/admin-dashboard",
                        type:"get",
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('auth_token') // Include the token
                        },
                        dataType:'json'
                    })
                    // window.location.href = ;
                }else if(data.role=="user"){
                    $.ajax({
                        url:"../api/user-dashboard",
                        type:"get",
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('auth_token') // Include the token
                        },
                        dataType:'json'
                    })
                }
                // document.querySelectorAll('.text-danger').forEach(el => el.remove());

                // if (data.errors) {
                //     // Display validation errors
                //     for (let key in data.errors) {
                //         let input = document.querySelector(`input[name="${key}"]`);
                //         let errorMessage = data.errors[key][0];
        
                //         let errorElement = document.createElement('span');
                //         errorElement.classList.add('text-danger');
                //         errorElement.classList.add('small');
                //         errorElement.textContent = errorMessage;
                        
                //         input.parentNode.appendChild(errorElement);
                //     }
                // }
            },
            error: function(xhr) {
                // console.error('Error:', xhr.responseText);
            }

        })
        // return false;
    })

    $(document).on("submit","#regsform",function(e){
        // console.log("Submit event handler triggered");
        e.preventDefault();
        $.ajax({
            url:"../api/registeruser",
            type:"POST",
            dataType:"json",
            data:new FormData(this),
            processData: false,
            contentType: false,
            success:function(data){
                console.log(data);

                document.querySelectorAll('.text-danger').forEach(el => el.remove());

                if (data.errors) {
                    // Display validation errors
                    for (let key in data.errors) {
                        let input = document.querySelector(`input[name="${key}"]`);
                        let errorMessage = data.errors[key][0];
        
                        let errorElement = document.createElement('span');
                        errorElement.classList.add('text-danger');
                        errorElement.classList.add('small');
                        errorElement.textContent = errorMessage;
                        
                        input.parentNode.appendChild(errorElement);
                    }
                }
            },
            error: function(xhr) {
                // console.error('Error:', xhr.responseText);
            }

        })

    })



})