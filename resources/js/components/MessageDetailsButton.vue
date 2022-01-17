<template>
    <div>
        <button class="action btn btn-theme" @click="showMessage" data-toggle="modal" data-target="#details-modal">
                                    <i class="fa fa-eye"></i>
                                </button>
    </div>
</template>

<script>
    export default {
        
            props:['msgId','viewed'],
            
            mounted() {
                console.log('Component mounted.')
            },
        
            methods:{
                showMessage(){
                    axios.post('/admin/message/'+this.msgId)
                    .then(response=>{
                    $('#details-modal-body').html(response.data);
                 
                 if(this.viewed==0){

                    setTimeout(() => {
                        document.querySelectorAll(".close-message").forEach(el=>{
                    
                            el.setAttribute("msg-id",this.msgId);   

                            el.addEventListener("click",e=>{
                                    e.preventDefault();
                                    axios.post('/admin/message/markasread/'+this.msgId).then(response=>{

                                    // Do nothing

                                    }).catch(errors=>{
                                        // Do nothing
                                   });
                                })

                        });
                    },1000);

                    }

                    })
                    .catch(errors=>{
                        if(errors.response.status==401){
                            window.location = '/admin/login';
                        }
                    });
                }
            }
        }
</script>