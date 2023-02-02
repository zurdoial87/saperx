<template>

    <div class="container">

        
        <component2></component2>

        
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-signin mt-5 mb-5">
                        <div class="text-center mb-4">
                            <h1 class="h3 mb-3 font-weight-normal">Editar Estudiante</h1>        
                        </div>

                        <div class="form-label-group mt-2">
                            <label for="nome">Nome</label>
                            <input type="hidden" id="id" name="id" class="form-control" v-model="id">
                            <input type="text" id="nome_edit" name="nome_edit" class="form-control" v-model="nome_edit" placeholder="Nome" required="" autofocus="">


                        </div>

                        <div class="form-label-group mt-2">
                            <label for="email">Email address</label>
                            <input type="email" id="email_edit" name="email_edit" class="form-control" v-model="email_edit" placeholder="Email address" required="" autofocus="">
                            
                        </div>

                        <div class="form-label-group mt-2">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone_edit" name="phone_edit" class="form-control" v-model="phone_edit" placeholder="phone" required="">
                            
                        </div>
                        
                        <div class="row mt-4">
                            <button class="btn btn-primary"  @click.prevent.self="update(id)"  type="submit" data-dismiss="modal">Update</button>
                        </div>                   
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                </div>
                </div>
            </div>
        </div>

        

    </div>

    
    
</template>

<script>
export default {
     
   data(){
    return {
        students: [],
        nome: "",
        email: "",
        phone:"",
        id:"",
        nome_edit:"",
        email_edit:"",
        phone_edit:"",
        options:[],
        selected:""

    }
   },
   mounted(){
        this.getAllStudents();
   },
   watch:{

    selected(newValue, oldValue) {
        alert("el nuevo valor es:"+newValue);
    }

   },
   methods: {
    async save(){

        axios.post("save_student",{
        nome: this.nome,
        email: this.email,
        phone: this.phone
    })
    .then(response => {
        
        if(response.data == "success"){
            //alert("estudiante insertado con suceso");
            this.nome= "";
            this.email= "";
            this.phone= "";
            this.getAllStudents();

        }

    });
    },
    async getAllStudents(){

        axios.get("/all_students")
        .then(response => {
            
            if(response.data){
                //alert("estudiante retornados");                
                this.students= response.data; 
                this.options= response.data;      
            }

        });
    }, 
    async edit(id){

       this.id = id;
       axios.get("get_student/"+id)
       .then(response => {
                        
            if(response.data){                
                this.nome_edit= response.data.nome;
                this.email_edit= response.data.email;
                this.phone_edit= response.data.phone;            

            }
        });
    },
    async update(id){

        axios.put("update_student",{
        id:   this.id,    
        nome: this.nome_edit,
        email: this.email_edit,
        phone: this.phone_edit
    })
    .then(response => {
        
        if(response.data == "success"){
            
            this.nome_edit= "";
            this.email_edit= "";
            this.phone_edit= "";
            this.getAllStudents();

        }

    });
    },
    async deletes(id){

        axios.delete("delete_student/"+id)
    .then(response => {
        
        if(response.data == "success"){            
            
            this.getAllStudents();

        }

    });
    }

   }

}
</script>