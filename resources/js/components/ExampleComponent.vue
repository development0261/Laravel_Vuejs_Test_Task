<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h3><b>User Inforamtion</b></h3>
            </div>
            <div class="col-md-8">
                <form id="myform">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Name</label>
                      <input type="text" class="form-control" v-model="name" name="name" placeholder="Name" dusk="name">
                      <p class="custom-error-class" v-if="errors.name">{{ errors.name[0] }}</p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Email</label>
                      <input type="text" class="form-control" v-model="email" name="email" placeholder="Email" dusk="email">
                      <p class="custom-error-class" v-if="errors.email">{{ errors.email[0] }}</p>
                    </div>                    
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Phone</label>
                      <input type="text" class="form-control" v-model="phone_number" name="phone_number" dusk="phone_number" v-mask="{mask: '(999) 999-9999', greedy: true}" placeholder="Phone">
                      <p class="custom-error-class" v-if="errors.phone_number">{{ errors.phone_number[0] }}</p>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Zip_code</label>
                      <input type="text" class="form-control" dusk="zip_code" name="zip_code" v-model="zip_code" placeholder="zip code">
                      <p class="custom-error-class" v-if="errors.zip_code">{{ errors.zip_code[0] }}</p>
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" dusk="address" name="address" v-model="address" placeholder="Address">
                    <p class="custom-error-class" v-if="errors.address">{{ errors.address[0] }}</p>
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                    <input type="file" multiple="" name="photo[]" ref="myFileInput" class="form-control" v-on:change="onImageChange">
                    <p class="custom-error-class" v-if="errors.photo">{{ errors.photo }}</p>
                  </div>
                  <button type="button" @click="addinfo()" class="btn btn-primary">Add</button>
                  <div class="alert alert-success mt-3" id="success_msg">
                    <strong>Well done! </strong>Insert Successfully..
                 </div>
             </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name : '',
                email : '',
                phone_number : '',
                zip_code : '',
                address : '',
                photo : [],
                errors : [],
                formData : new FormData

            }
        },
        methods:{
            onImageChange(e){
                for(let i=0;i<e.target.files.length;i++)
                {
                    this.formData.append('photo[]', e.target.files[i]);
                }
            },
            addinfo()
            {
                $("#myform").validate({
                      rules: {
                        name: "required",
                        email: "required",
                        phone_number:{
                            required:true,
                            minlength: 14,
                            maxlength: 14
                        },    
                        zip_code:{
                            required:true,
                            minlength: 5,
                            maxlength: 5
                        },    
                        address: "required",
                        "photo[]":{
                            required:true,
                        },                           
                      }
                    });
                if($("#myform").valid()) 
                {
                    const config = {
                        headers: { 'content-type': 'multipart/form-data' }
                    }
                    this.formData.append('name' , this.name);
                    this.formData.append('email', this.email);
                    this.formData.append('phone_number', this.phone_number);
                    this.formData.append('zip_code', this.zip_code);
                    this.formData.append('address', this.address);

                    axios.post('./add-userinfo',this.formData, config).then(response =>{

                                this.errors= []
                                if(response.status === 200)
                                {   
                                    this.name = this.email = this.phone_number = this.zip_code = this.address = ""
                                    this.$refs.myFileInput.value = '';
                                    $("#success_msg").show();
                                    let timeout = null;
                                    clearTimeout(timeout);
                                    timeout = setTimeout(() => {
                                    $("#success_msg").hide();
                                  },5000)
                                }
                        }).catch(error => {
                            if(error.response.status == 422)
                            {
                                this.errors = error.response.data.errors
                                /*console.log(error.response.data.errors.value)*/
                            }
                        })
                    }
            },
        },
        mounted() {
            $("#success_msg").hide();
        }
    }
</script>
