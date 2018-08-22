Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#drop", { 
	url: "/learnweb/upload/dropzone/uploader.php",
	addRemoveLinks: true,
	autoProcessQueue: false,
	uploadMultiple: false,
	parallelUploads: 25,
	maxFiles: 25,
	dictDefaultMessage: "วางไฟล์ที่นี่",
	dictCancelUpload: "<i class='material-icons'>cancel</i>",
	dictRemoveFile: "<i class='material-icons'>cancel</i>",
});

myDropzone.on("success", function(file){
	console.log(file.xhr.response)
	let res = JSON.parse(file.xhr.response)
	console.log(res)
	file.previewElement.appendChild(
		Dropzone.createElement(`<input type="hidden" name="img_path[]" value="${res.img_path}">`)
	)
})


$(document).ready(function(){

	let app = new Vue({
		el: "#app",
		data: {
			posts: []
		},
		methods: {
			imgClass(n){
				if(n>1){
					return 'w-50'
				}else{
					return 'img-fluid'
				}
			},
			moment
		}
	})
	
	$("body").on("submit", "#form-post", function(e){
		e.preventDefault();
		myDropzone.processQueue()
	})

	myDropzone.on("queuecomplete", function(){
		let this_ = $("#form-post")
		$.ajax({
			url: this_.attr("action"),
			data: this_.serialize(),
			method: this_.attr("method"),
			dataType: 'json',
			success: function(res){
				console.log(res)
				this_.find("input, select").val("")
				myDropzone.removeAllFiles()
				loadData()
			}
		})		
	})

	loadData()

	function loadData(){
		$.ajax({
			url: "/learnweb/upload/dropzone/json/json_post_data.php",
			dataType: 'json',
			success: function(res){
				console.log(res)
				if(res.success){
					app.posts = res.posts
				}
			}
		})
	}

})