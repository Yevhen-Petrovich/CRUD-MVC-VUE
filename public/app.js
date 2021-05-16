var app = new Vue({
    el : '#app',

    data() {
      return {
     
      	arrayUsers:[],
        id : 0,
        name : '',
        group_name : '',
		faculty: '',
		average_score: '',
        addMode : true,
        titleModal : '',
        show : false
 
      }
    },
  	methods: {
	    listar(){
			let t=this;
			const url= '../controllers/controller.php';
			axios.get(url).then(function (response){
			
				t.arrayUsers= response.data;
			
			})
			.catch(function (error) {
				console.log(error);
			});
		},
		add(){
			const params = {
				name_a: this.name,
				group_name : this.group_name,
				faculty : this.faculty,
				average_score : this.average_score
			};
			
			axios.post('../controllers/controller.php',params)
			.then((response)=>{ 
				if(response.data){
					Swal.fire(
						'Success!',
						'Added record.',
						'success'
					)
					this.listar();
          this.closeModal();
				}
				else
					alert("input error");
			});		
		},
		edit(){
			const params = {
				id : this.id,
				name: this.name,
				group_name : this.group_name,
				faculty : this.faculty,
				average_score : this.average_score
			};
			
			axios.post('../controllers/controller.php',params)
			.then((response)=>{ 
				if(response.data){
					Swal.fire(
						'Success!',
						'Record edited.',
						'success'
					)
					this.listar();
          this.closeModal();
				}
				else
					alert("error al edit");
			});		
		},
		remove(id){
			const params = {
				id_drills: id,
			};
			

      Swal.fire({
		title: 'Are you sure?',
        text: "You are going to delete this user!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.value) {
          axios.post('../controllers/controller.php',params)
          .then((response)=>{ 
            if(response.data){
                Swal.fire(
				'Erased!',
                'User deleted successfully.',
                'success'
              )
              this.listar();
            }
            else
              alert("error while deleting");
          });  
        }
      })
		},
		abrirModal(mode, username = []){
        this.show = true;
        if(mode == 'add')
        {
          this.titleModal = 'ADD';
        }
        else
        {
          this.addMode = false;
          this.titleModal= 'EDIT';
          this.name = username.name;
          this.group_name = username.group_name;
		  this.faculty = username.faculty;
		  this.average_score = username.average_score;
          this.id = username.id;
        }
    },
    closeModal(){
        this.show = false;
        this.name = '';
        this.group_name = '';
		this.faculty = '';
		this.average_score = '';
        this.addMode = true;
    }
	}, 
  mounted() {
    this.listar();
  }
 })