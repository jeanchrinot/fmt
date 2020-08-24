<template>
    <div>
        <button class="action btn btn-theme" @click="showDetails" data-toggle="modal" data-target="#details-modal">
                                    <i class="fa fa-eye"></i>
                                </button>
    </div>
</template>

<script>
    export default {
        
            props:['itemType','itemId'],
            
            mounted() {
                console.log('Component mounted.')
            },
        
            methods:{
                showDetails(){
                    axios.post('/admin/details/'+this.itemType+'/'+this.itemId)
                    .then(response=>{
                    $('#details-modal-body').html(response.data);
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