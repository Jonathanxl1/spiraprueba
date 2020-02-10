<template>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6 col-sm-9">
					<form   :action="'/alumnos/' + id" method="put"  >
						<div class="form-group">
							<input type="hidden" name="_token" :value="token" >
						    <label for="name">Nombre</label>
						    <input type="text" class="form-control" name="name" id="name" required :value="alumno.name" >
						    <label for="email">Email</label>
						    <input type="email" class="form-control" name="email" id="email" required :value="alumno.email" >
						    <label for="phone">Telefono</label>
						    <input type="tel" class="form-control" name="phone" id="phone"  max="12" placeholder="1234567890" :value="alumno.phone">
						    <label for="course">Curso :</label>
						    	<select class="form-control" id="course" name="course">
							      <option>1</option>
							      
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

  name: 'update',
  props:['token','id'],

  data () {
    return {
    	alumno:{}
	
    }
  },
  mounted(){

	fetch(`/alumnos/${id}`,{
		 	headers:{
		 		method:'GET',
		 		'Content-Type':'application/json',
		 		'X-CSRF-TOKEN':this.token
		 	}
		 }).then((response)=>{ return response.json()})
		.then((alumno)=>{this.alumno = alumno})



  }
}
</script>

