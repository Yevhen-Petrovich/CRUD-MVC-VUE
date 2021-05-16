<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />
	<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div id="app">
	<div class="container">
  <div class="bg-primary d-flex align-items-center p-3 my-3 bg-purple rounded shadow-sm mt-5">
    <img class="me-3" src="img/logo.png" alt="" width="48" height="38">
    <div class="lh-1">
      <h2 class="mb-0 text-black lh-1 ">List of part-time students</h2>
    </div>
  </div>
		<br>
		<button @click="abrirModal('add')" class="btn btn-primary fa fa-plus"> Add</button>
		<br>
		<br>
			<table class="table table-bordered">
			<thead>
				<tr class="bg-primary text-white" style="  background-color: white; color:black;">
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col">Group</th>
					<th scope="col">Faculty</th>
          <th scope="col">Average score</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="username in arrayUsers" :key="username.id">
					<td v-text="username.id"></td>
					<td v-text="username.name"></td>
					<td v-text="username.group_name"></td>
					<td v-text="username.faculty"></td>
          <td v-text="username.average_score"></td>
					<td><button @click="abrirModal('',username)" class="btn btn-warning"> <i class="fa fa-pencil"></button></td>
					<td><button @click="remove(username.id)" class="btn btn-danger" > <i class="fa fa-trash"></i></button></td>
				</tr>
			</tbody>
			</table>
	</div>


	   <b-modal v-model="show">
            <template  slot="modal-header">

              
               <h5>{{titleModal}}</h5>
               <button type="button" class="close fa fa-close" @click="closeModal()" aria-label="Close">
                           <span aria-hidden="true"></span>
                </button>
                
            </template>
            
          <b-container fluid>
            <div>
              <b-form>
              
                <b-form-group  class="mb-0 mt-0" label="Name:">
                  <b-form-input type="text" v-model="name"></b-form-input>
                  <hr>
                </b-form-group>

                <b-form-group  class="mb-0 mt-0" label="Group:">
                  <b-form-input type="text" v-model="group_name"></b-form-input>
                  <hr>
                </b-form-group>
				
				        <b-form-group  class="mb-0 mt-0" label="Faculty:">
                  <b-form-input type="text" v-model="faculty"></b-form-input>
                  <hr>
                </b-form-group>

                
                <b-form-group  class="mb-0 mt-0" label="Average score:">
                  <b-form-input type="number" v-model="average_score"></b-form-input>
                  <hr>
                </b-form-group>

                </b-form-group>
                  
              </b-form>
            </div>
          </b-container>

            <div slot="modal-footer" class="w-100">
              <b-button v-if="addMode"
                variant="primary"
                class="float-right ml-2"
                @click="add"
              >Add
              <i class="fa fa-plus-circle"></i>
              </b-button>

              <b-button v-else
                variant="primary"
                class="float-right ml-2"
                @click="edit"
              >Edit
              <i class="fa fa-pencil"></i>
              </b-button>

              <b-button
                variant="danger"
                class="float-right"
                @click="closeModal()"
              >Close
              <i class="fa fa-times-circle"></i>
              </b-button>
            </div>

          </b-modal>
          <footer class="text-center mt-5">
      <div>Made by:
        <a class="text-dark" target="_blank" href="https://github.com/Yevhen-Petrovich">Yevhen Kholiavka</a>
        <ul class="container" id="year"></ul>
        <script>
    document.getElementById("year").innerHTML = new Date().getFullYear();
</script>
      </div>

    </footer>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//unpkg.com/vue@latest/dist/vue.min.js"></script>
<script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="app.js"></script>