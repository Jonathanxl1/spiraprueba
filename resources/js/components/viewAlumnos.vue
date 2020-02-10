<template>
	<div class="container">
		
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Mail</th>
				      <th scope="col">Materias</th>
				      <th scope="col">Editar</th>
				      <th scope="col">Borrar</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<tr v-if="alumnos.length == 0"><td colspan="6" class="text-center">No Hay Estudiantes Ingresados aun</td></tr>
				    <tr v-for="alumno in alumnos" :key="alumno.id">
						<td>{{alumno.id_alumno}}</td>
						<td>{{alumno.name}}</td>
						<td>{{alumno.email}}</td>
						<td>
							<ul class="list-group">
								<li class="list-group-item" v-for="curso in alumno.cursos">{{curso.name_course}}</li>
							</ul>
							
						</td>
						<td><a :href="'edit/' + alumno.id_alumno" >Editar</a></td>
						<td><span  @click="del(alumno.id_alumno)" >Borrar</span></td>		      
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</template>

<script>
export default {

  name: 'viewalumnos',
  props:['token','api'],

  data () {
    return {
		alumnos:[]
		

	  }
  },
  mounted(){
	
		fetch(this.api,{
		 	headers:{
		 		'Content-Type':'application/json',
		 		'X-CSRF-TOKEN':this.token
		 	}
		} ).then((res) => { return res.json() })
		 	.then( (data)=>{ 
				this.alumnos = data;
		 		console.log(data) })	
	},
   methods:{
		del:function(id){
			console.log(id);
			fetch(`/alumnos/${id}`,{
				 method: 'DELETE',
              	 headers: {
               		'X-CSRF-TOKEN':this.token
              			 },

			}).then(res =>{ res.text()})

		}
	
},
	updated(){
		
			fetch(this.api,{
		 	headers:{
		 		'Content-Type':'application/json',
		 		'X-CSRF-TOKEN':this.token
		 	}
		} ).then((res) => { return res.json() })
		 	.then( (data)=>{ 
				this.alumnos = data;
		 		console.log(data) })

		
	}
}
</script>

