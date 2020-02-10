<template>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6 col-sm-9">
					<form   :action="route" method="post"  >
						<div class="form-group">
							<input type="hidden" name="_token" :value="token" >
						    <label for="name">Nombre</label>
						    <input type="text" class="form-control" name="name" id="name" required >
						    <label for="email">Email</label>
						    <input type="email" class="form-control" name="email" id="email" required >
						    <label for="phone">Telefono</label>
						    <input type="tel" class="form-control" name="phone" id="phone"  max="12" placeholder="1234567890" value="0">
						    <label for="course">Curso :</label>
						    	<select class="form-control" id="course" name="course">
							      <option v-for="curso in cursos" :value="curso.id_curso">{{curso.name_course}}</option>
							      
							     </select>

			
						  </div>

						  <button class="btn btn-success" type="submit">Enviar</button>
				
					</form>
				</div>
			</div>
		</div>


</template>

<script>
export default {

  name: 'edit',
  props:['route','token'],
  data () {
   return {
   	 
     cursos:[],
   }
  },
  mounted(){
		fetch('/cursos',{
		 	headers:{
		 		method:'POST',
		 		'Content-Type':'application/json',
		 		'X-CSRF-TOKEN':this.token
		 	}
		 }).then((response)=>{ return response.json()})
		.then((cursos)=>{this.cursos = cursos})

  },
  methods:{
  	form:function(e){
  		console.log(this.form);

  		e.preventDefault();
  	}
  }

  
}
</script>

