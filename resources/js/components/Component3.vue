<template>


<div> 

    <div class="jumbotron text-center">
        <h1 class="display-4 ">SAPERX</h1>
        
        <h1>SISTEMA DE AGENDA TELEFÔNICA</h1>
        <p class="lead">
            
        </p>
    </div> 


<div class="container">

                <div class="row mt-5">
                   
                </div>

                <hr/>

                <h2 class="card-text text-center">GESTÃO DE CONTATOS</h2>


                <div class="row" style="padding-top: 50px;"> 

                        <div class="col-sm-2" style="margin-top: 36px;">

                           <button type="submit" class="btn btn-primary ml-3 mb-4" data-toggle="modal" data-target="#formInserirCont" title="Inserir"><i class="fa fa-solid fa-plus"></i> Inserir contato</button>
                                                                                      
                        </div>

                        <div class="col-sm-4"></div>

                        <div class="col-sm-4">

                            <div  class="form-label-group mt-2">
                                <label for="data_dose_3">Usuários</label>
                                <v-select :options="users" :reduce="user => user.id" label="name" v-model="user_select_geral" ></v-select>

                            </div>
                                                                                      
                        </div>

                        <div class="col-sm-2" style="margin-top: 36px;">

                           <button type="submit" class="btn btn-success ml-3 mb-4" @click.prevent.self="getContacts()"> Mostrar contatos</button>
                                                                                      
                        </div>

                </div>

                <div class="row" style="padding-top: 10px;">

                                       

					<div class="col-lg-12">
						<div class="card mb-4 p-4">
                            
							<table class="table table-bordered table-striped table-hover" id="tabela-contato">

                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome contato</th>
                                    <th scope="col">Número</th>                                    
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="contact in contacts" :key="contact.id">
                                    <th scope="row">{{contact.id}}</th>
                                    <td>{{contact.nome}}</td>
                                    <td>{{contact.numero}}</td>
                                    <td style="width: 12%;">                                        
                                        <button type="submit" class="btn btn-primary btn-edit" @click.prevent.self="edit(contact.id)" data-toggle="modal" data-target="#formEditCont" title="Editar"><i class='fa fa-pencil'></i></button>
                                        
                                        <button type="submit" class="btn btn-danger btn-delete" @click.prevent.self="remover(contact.id)"  title="Remover"><i class="fa fa-times"></i></button>                                                                                              
                                        
                                    </td>
                                    </tr>
                                    
                                </tbody>
        
                            </table>
						</div>
					</div>
				</div>


                <div class="modal fade lg" id="formInserirCont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inserir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-signin mt-5 mb-5">

                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal">Dados contato</h1>        
                                </div>

                                <div class="row" style="margin-bottom: 38px;">
                                    <div class="col-sm-6">

                                        <div  class="form-label-group mt-2">
                                            <label for="data_dose_3">Usuário*</label>
                                            <v-select :options="users" :reduce="user => user.id" label="name" v-model="user_select" ></v-select>

                                        </div>
                                                                                      
                                    </div>                                           
                                </div> 

                                <hr/>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="cpf">Nome do contato*</label>
                                            <input type="text" id="nome" name="nome" class="form-control" v-model="nome" placeholder="Nome" required="" autofocus="">

                                        </div>                                               
                                    </div>

                                     <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="nome">Número*</label>
                                            <input type="number" id="numero" name="numero" class="form-control" v-model="numero" placeholder="Infome o número de contato" required="" autofocus="">
                                            
                                        </div>                                               
                                    </div>       
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"  @click.prevent.self="inserir()"  type="submit"><i class="fa fa-solid fa-plus"></i>  Inserir</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="formEditCont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
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
                                    <h1 class="h3 mb-3 font-weight-normal">Editar contato</h1>        
                                </div> 

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div  class="form-label-group mt-2">
                                            <label for="">Usuário</label>
                                            <v-select :options="users" :reduce="countryg => countryg.id" label="name" v-model="user_select_edit" disabled></v-select>

                                        </div>
                                                                                      
                                    </div>
                                          
                                </div>                               

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="cpf_edit">Nome do contato*</label>
                                            <input type="hidden" id="id" name="id" class="form-control" v-model="id"> 
                                            <input type="text" id="nome_edit" name="nome_edit" class="form-control" v-model="nome_edit" placeholder="Nome do contato" required="" autofocus="">

                                        </div>                                               
                                    </div>

                                     <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="nome_edit">Número*</label>
                                            <input type="number" id="numero_edit" name="numero_edit" class="form-control" v-model="numero_edit" placeholder="Infome o número de contato" required="" autofocus="">
                                            
                                        </div>                                               
                                    </div>       
                                </div>                       
                  
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"  @click.prevent.self="update(id)"  type="submit" >Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                        </div>
                        </div>
                    </div>
                </div>


</div>

</div>

 
    
</template>


<script>


import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';


export default {

    data(){
    return {
        users: [],
        contacts: [],
        nome:"",
        numero:"",        
        user_select:"-- Selecione a usuario --",
        user_select_geral:"-- Selecione a usuario --",        
        id:"",
        nome_edit:"",
        numero_edit:"",
        user_select_edit:"-- Selecione a usuario --"
           

    }
   },
   components: {
    vSelect
  },
   mounted(){
        this.getAllUsers();              
   },   
   methods: {
    
    async getAllUsers(){

        axios.get("/all_users")
        .then(response => {
            
            if(response.data){
                      
                this.users= response.data;
            }

        });
    },
    async getContacts(){

        if(this.user_select_geral == "" || this.user_select_geral =="-- Selecione a usuario --"){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'Deve selecionar primeiro um usuário!',
           
            });            

        }else{

            axios.get("/show_contacts_user/"+this.user_select_geral)
            .then(response => {
                
                if(response.data.length != 0){
                                           
                    this.contacts= response.data;
                    
                                        
                }else{

                    this.contacts= response.data;

                    Swal.fire({
                        type: 'warning',
                        title: 'Atenção',
                        html: 'Não existem contatos para esse usuário!',
                
                    });

                }

            });

        }

        
    },    
    async inserir(){        

        
        if(this.nome == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo nome é obrigatorio!',
           
            }); 

        }else if(this.numero == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo número é obrigatorio!',
                
            }); 

        }else if(this.user_select == "" || this.user_select ==  "-- Selecione a usuario --" ){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'Deve selecionar um usuário!',
                
            }); 

        }else{

                        
            axios.post("/save_contato",{
                nome: this.nome,
                numero: this.numero,                
                user_id: this.user_select
                
            })
            .then(response => {
                
                if(response.data == "success"){
                    
                    Swal.fire({
                        type: 'success',
                        title: 'Sucesso',
                        html: 'Contato adicionado com sucesso!',
                        onClose: function(){

                            $('#nome').val("");
                            $('#numero').val("");
                                                    
                        }
                    }); 

                    

                }

            });
            
        }          

    },    
    async edit(id){

       this.id = id;
       axios.get("get_contato/"+id)
       .then(response => {
                        
            if(response.data){                
                
                this.nome_edit        = response.data.nome;
                this.numero_edit      = response.data.numero;
                this.user_select_edit = response.data.user_id;

            }
        });
    },
    async update(id){

        axios.put("update_contato",{
        id:   this.id,    
        nome: this.nome_edit,
        numero: this.numero_edit,        
        user_id: this.user_select_edit
        
        
    })
    .then(response => {
        
        if(response.data == "success"){

            Swal.fire({
                type: 'success',
                title: 'Sucesso',
                html: 'Contato atualizado com sucesso!',
                    onClose: function(){

                        $('#nome_edit').val("");
                        $('#numero_edit').val("");  
                                                     
                                                                
                    }
            });            
            
            this.getContacts();

        }

    });
    },
    async remover(id){

        
        Swal.fire({
            title: 'Você tem certeza que deseja excluir o contato selecionado?',
            text: "Você não poderá reverter isso!",
            type: "warning",
            animation: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: "Agora não!",
            showLoaderOnConfirm: false
            }).then((result) => {
            if (result.value) {

                
                axios.delete("delete_contato/"+id)
                .then(response => {
                    
                    if(response.data == "success"){ 

                        Swal.fire({
                            type: 'success',
                            title: 'Sucesso',
                            html: 'Contato removido com sucesso!'
                               
                        });       

                        this.getContacts();

                    }

                });

            }
        })

        
    }

   }
    
}
</script>

<style scoped>
    	.pagination {
			float: right;
		}

		table.table-bordered tbody td {
			padding: 10px;
			text-align: center;
		}

		table.dataTable thead>tr>th {
			padding: 10px;
			text-align: center;
		}
        .btn-edit{
            margin-right: 5px;
        }
        .btn-delete{
            width: 41%;
        }
</style>