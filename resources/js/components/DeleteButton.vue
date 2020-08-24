<template>
    <div>
        <button class="action btn btn-danger" @click="deleteMessage()" data-toggle="modal" data-target="#delete-modal"><i class="fa fa-trash"></i></button>
    </div>
</template>

<script>
    export default {
        
            props:['itemType','itemId'],
            
            mounted() {
                console.log('Delete Component mounted.')
            },
        
            methods:{
                deleteMessage(){

                    $('#confirm-delete').replaceWith($('#confirm-delete').clone());

                    document.querySelector("#confirm-delete").addEventListener("click",this.clickHandler, false);

                    /*var checkExist = setInterval(()=> {
                       if ($('#confirm-delete').length) {
                          clearInterval(checkExist);
                          document.querySelector("#confirm-delete").removeEventListener("click",this.clickHandler, false);
                          document.querySelector("#confirm-delete").addEventListener("click",this.clickHandler, false);
                       }
                    }, 100); // check every 100ms
                    */
                    
                },

                clickHandler(e){

                    e.preventDefault();
                        
                        axios.post('/admin/delete/'+this.itemType+'/'+this.itemId).then(response=>{
                            console.log(response.data.error);
                           if((response.data.error)!=null){
                                var errorAlert = `
                                <div class="alert alert-danger alert-dismissible" id="error-alert" style="position:absolute;width:80%;opacity: 0;transition: opacity 0.3s;">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <div id="error-message"></div>
                                </div>
                            `;
                                $('#alert-area').html(errorAlert);
                                $('#error-message').html(response.data.error);
                                $('#error-alert').css('opacity',1);
                            }
                            else{
                                location.reload();
                            }

                        }).catch(errors=>{
                            if(errors.response.status==401){
                                window.location = '/admin/login';
                            }
                       });


                }
            }
        }
</script>