

 $(function(){
	 
  years();
  months();
  Days()
  $("#dr_year").change(function () {
    months();
    Days();
  });
  $("#dr_month").change(function () {
    Days();
  });
  function years()
  {
    for(var i=1900;i<=2100;i++)
    {
      var str = "<option value=\"" + i + "\">" + i + "</option>";
      $("#dr_year").append(str);
    }
  }
  function months() {
    $("#dr_month").empty();
    for (var )
    for (var i = 1; i <= 12; i++) {
      var str = "<option value=\"" + i + "\">" + i + "</option>";
      $("#dr_month").append(str);
    }
  }
  function Days() {
    $("#dr_day").empty();
    if (parseInt($("#dr_month").val()) == 1 || parseInt($("#dr_month").val()) == 3 || parseInt($("#dr_month").val()) == 5 || parseInt($("#dr_month").val()) == 7 || parseInt($("#dr_month").val()) == 8 || parseInt($("#dr_month").val()) == 10 || parseInt($("#dr_month").val()) == 12) {
      days = 31;
    }
    else if (parseInt($("#dr_month").val()) == 4 || parseInt($("#dr_month").val()) == 6 || parseInt($("#dr_month").val()) == 9 || parseInt($("#dr_month").val()) == 11) {
      days = 30;
    }
    else {
      if (parseInt($("#dr_year").val()) % 400 == 0 || (parseInt($("#dr_year").val()) % 4 == 0 && parseInt($("#dr_year").val()) % 100 != 0)) {
        days = 29;
      }
      else {
        days = 28;
      }
    }
    for (var i = 1; i <= days; i++) {
      var str = "<option value=\"" + i + "\">" + i + "</option>";
      $("#dr_day").append(str);
    }
  }
 })


/* 
 * author: Penghai Zhang
 * assignment : 3
 * date: 08-04-2016
 */
 
 
 
 
 
//set global variables

/*
 *  used in home page for the functionality of showing teachers' details
 *  three arrays used to store teachers' details : name, birthday and email.
 */
var teacher_info_ctrl = false; 
var teacher_name = new Array();
var teacher_bod = new Array();
var teacher_email = new Array();

/*
 *  used in admin area page for the functionality of user management
 *  six arrays used to store users' details
 */
var user_management_email = new Array();
var user_management_access = new Array();
var user_management_id = new Array();
var user_management_username = new Array();
var user_management_name = new Array();
var user_management_bod = new Array();
$(function(){
	

  /*
   * show current time on home page
   * refresh the time every second by setInterval
   */
  
  function home_page_date_time(){ 
	var date=new Date(),str=''; 
	str +=date.getFullYear()+'-'; 
	str +=date.getMonth()+1+'-'; 
	str +=date.getDate()+' '; 
	str +=date.getHours()+':'; 
	str +=date.getMinutes()+':'; 
	str +=(date.getSeconds()<10)? '0'+date.getSeconds():date.getSeconds() ; 
	$("#home_page_date_time").text(str);}
	home_page_date_time();
    setInterval(home_page_date_time,1000); 



 /* 
  * control the words displaying in home page through judging the value of variable teacher_info_ctrl
  */
	$(".teacher li").click(function(){
	if(!teacher_info_ctrl){
		teacher_info_ctrl = true;
		var img_name=$(this).attr("name");
		if(img_name == 'first'){
			$("#introduction").html('birthday: '+teacher_bod[0]+'<br>Email: '+teacher_email[0]);
		}else 	if(img_name == 'second'){
			$("#introduction").html('birthday: '+teacher_bod[1]+'<br>Email: '+teacher_email[1]);
		}
		 else	if(img_name == 'third'){
			$("#introduction").html('birthday: '+teacher_bod[2]+'<br>Email: '+teacher_email[2]);
		}
	}else{
		teacher_info_ctrl = false;
		$("#introduction").html("<div class=\"title\">Welcome to my website</div><p>This is Penghai\'s assignment3 of KIT502</p><br><span id=\""+"more_information\">Upcoming activities are showed below</span>");
	}
	});

 /* 
 *  swtich the pictures in home page about upcoming activities.
 *  the judegement of which pictures will be shown is accoring to the value of remainder gotten from activity_img_count%2
 */
	var activity_img_count = 0;
	function activity_img_change(){
		
		if( activity_img_count%2 == 0 ){
			$("#activity_img2").fadeOut(500);
			$("#activity_img1").fadeIn(500);
			$("#activity_img4").fadeOut(500);
			$("#activity_img3").fadeIn(500);
	
			activity_img_count = activity_img_count + 1;
		}
		else{
			$("#activity_img1").fadeOut(500);
			$("#activity_img2").fadeIn(500);
			$("#activity_img3").fadeOut(500);
			$("#activity_img4").fadeIn(500);
			activity_img_count = activity_img_count + 1;
		}
	}
	interval = setInterval(activity_img_change,2000); 

 


});

 /* 
 *  clearForm: reset the data in feedback form
 *  feedback_submit: submit the form to the php file
 */
  function clearForm(id){
			  $('+id+').form('clear');
		  }
  function feedback_submit()
  {
	$.ajax({
	 url : 'action.php',
	 type : 'post',
	 data : {
		 state : $('#state').combobox('getValue'),
		 city : $('#city').combobox('getValue'),
		 gender : $('input:radio[name=gender]:checked').val(),
		 satisfaction : $('input:radio[name=satisfaction]:checked').val(),
		 submit : 'feedback_submit'
	 },
	 success : function(msg){
		 alert(msg);
	 }
	})
  }
  
  /*
   * post the log in / out request to the php file by ajax
   */
  
  function login_submit()
  {
	$.ajax({
	 url : 'action.php',
	 type : 'post',
	 data : {
		 username : $('#login_username').val(),
		 password : $('#login_password').val(),
		 submit : 'login_submit'
	 },
	 success : function(msg){
		 if(msg.indexOf('successfully')>0){
			 window.open("home_page.php","_self");
		 }
		 else{
		 alert(msg);
		 }
	 }
	})
  }

  function log_out()
  {
	  $.ajax({
	  url: 'action.php',
	  type: 'POST',
	  data: {
	  submit: 'logout_submit'
	  },
	  success : function(msg){
		  window.open("home_page.php","_self");
	  }
	  })
  }

  /*
   * post the request of getting teachers' details to the php file by ajax
   * the data of teachers' details sent from the php file will be stored in the three arrays
   * because the pattern of the returned data is JSON String which can not be recognized by JS, so $.parseJSON is used to transfer the pattern from
   * JSON to an JS object
   */   
  function get_teacher_info()
  {
	$.ajax({
		url: 'action.php',
		type: 'POST',
	   // async: false,
		data: {submit:'home_page_request'},
		success: function(msg){
			obj= $.parseJSON(msg);  
		　$.each(obj, function(i, item){             
			  teacher_name.push(item[1]);
			  teacher_bod.push(item[3]);
			  teacher_email.push(item[4]);
	　    });	
		  $('#first_name').text(teacher_name[0]);
		  $('#second_name').text(teacher_name[1]);
		  $('#third_name').text(teacher_name[2]);
		}
  })	
  }
  /*
   * post the sign in request to the php file by ajax
   * the page will be redirected to login page if the sign in request is successful
   */
  function register_submit() {
		  $.ajax({
			  url: 'action.php',
			  type: 'post',
			  data: {
			  username:$("#username").val(),
			  password:$("#password").val(),
			  re_password:$("#re_password").val(),
			  firstname:$("#firstname").val(),
			  lastname:$("#lastname").val(),
			  email:$("#email").val(),
			  year:$("#year").val(),
			  month:$("#month").val(),
			  day:$("#day").val(),
			  submit:'sign_up_submit'
			  },
			  success: function(msg) {
				  alert(msg);
				  if(msg.indexOf('congratulation')>0){
				  location.href="login.html";
				  }
			  }
		  });
  }
  
   /*
   * check whether the password typed in my area page is exactly same as that stored in the session
   */
  function verifyPassword(request_source) {
	  $.ajax({
		  url: 'action.php',
		  type: 'post',
		  data : {password : (request_source == 'my')? $('#my_area_password').val() : $('#admin_area_password').val() ,
		          submit : (request_source == 'my')? 'my_area_verify' : 'admin_area_verify' 
		   },
		   success: function(msg){
			  if(request_source == 'my'){ 
			   if(msg.indexOf('ok') >0 ){
				$('#my_area_email_panel').show();
				$('#my_area_birthday_panel').show();
				$('#my_area_name_panel').show();	
				$('#my_area_button_panel').show();	
				$('#my_verify_button').attr("disabled", "disabled")		   
			   }
			   else{
				   alert(msg); 
			   }
			  }
			  else{
				if(msg.indexOf('[') >0 ){
				 obj= $.parseJSON(msg);  
				　$.each(obj, function(i, item){   
					  $('#user_management_table').append("<tr><td id='id"+i+"' class='id'>"+item[5]+"</td><td>"+item[0]+"</td><td>"+item[1]+"</td><td>"+item[3]+"</td><td class='email'>"+item[4]+"</td><td>"+user_role(item[2],i)+"</td><td><input type='button' value='save' onClick='update_access("+i+")' /></td></tr>");				  
			　    });
			     $('#user_management_table').show();
				 $('#admin_verify_button').attr("disabled", "disabled");
				}
				else{
				   alert(msg); 
			    }
			  }
		   }
	  })
  }
  function user_role(access,i){
	  var result;
	  if(access == 1){
		  result = "<select id='select"+i+"' ><option value='1'  selected = 'selected'>Admin</option><option value='2'>General</option></select>";
	  }
	  else{
		  result = "<select id='select"+i+"' ><option value='1'>Admin</option><option value='2'  selected = 'selected'>General</option></select>";
	  }
	  return result;
  }
  function update_access(i){
	//alert('id'+i);  
	var id = $('#id'+i).text();
	var access = $('#select'+i).val();
	$.ajax({
		url :'action.php',
		type: 'POST',
		data: {
			id : id,
			access : access,
			submit : 'update_access'
		},
		success: function(msg){
			alert(msg);
		}	
	})
  }
  
   /*
   * post the request of updating personal information to the php file
   */
  function my_area_submit() {
	 	  $.ajax({
		  url: 'action.php',
		  type: 'post',
		  data : {password : $('#my_area_password').val(),
				  name : $('#my_area_name').val(),
				  birthday : $('#my_area_birthday').datebox("getText"),
				  email : $('#my_area_email').val(),
				  id : $('#id').val(),
		          submit : 'my_area_update'
		   },
		   success: function(msg){
				   alert(msg); 	
				   		  
		   }
	  }) 
  }
   
  
  
  
  
  
  /* 
   *  functions below are used to set the format of date . This date plugin is provided by Jquery-EasyUI
   *  reference:http://www.jeasyui.com/demo/main/index.php?plugin=DateBox&theme=default&dir=ltr&pitem=
   */
    function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
    function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }