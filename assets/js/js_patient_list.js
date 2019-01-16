$(document).ready(function(){
	$(document)
		.on("click",'.open_modal', function(){
			var patientid = $(this).attr('data-id');
			modal.show_modal(patientid, "View Patient Complaint",'view_info')
		})
		.on("click", ".export_patient", function(){
			modal.show_modal('', "Export Patient",'export_patient')
		})
		.on("click", ".view_history", function(){
			var cons_id = $(this).attr('data-id');
			modal.history_vw = json_cons_record[cons_id];
			modal.show_modal('', "Patient Record" )
		})
		.on("submit", '#mod_patient_list', function(W){
			W.preventDefault();
			var data= encodeURI($(this).serialize());
			console.log($('input[name=type]'))
			if($('input[name=type]').length == 0){
				window.open(base_url+'export_excel/excel_all_patients?'+data, '_blank')
			}else{
				window.open(base_url+'export_excel/excel_patients_from?'+data, '_blank')				
			}
		})
		.on("click", ".adv_search", function(){

		})
})
var modal = new Vue({
	el: '.modal',
	data: {
		modal_title   : 'TITLE',
		modal_content : {},
		type		  : 'view_info',
		history_vw 	  : {}
	},
	methods: {
		show_modal: function(patientid, title, type){
			this.modal_title = title;
			this.type = type;
			if(patientid){
				this.modal_content = patients[patientid]
			}
		}
	}
});