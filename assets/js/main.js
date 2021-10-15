function check_fname() {
	var fname = $("#fname").val();
	var ptn = /^[a-zA-Zก-์]+$/;
	$.post("check_fname", { fname: fname }, function (data, status) {
		//  alert(data);  //เช็คค่า
		if (data > 0) {
			$("#w_fname").html("<span style='color:red;'>ข้อมูลซ้ำ</span>");
			$("#fname").val("");
		} else {
			if (fname.match(ptn)) {
				$("#w_fname").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
			} else if (fname == "") {
				$("#w_fname").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
			} else {
				$("#w_fname").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
				$("#fname").val("");
			}
		}
	});
}

// แก้ไขชื่อ
function edit_fname() {
	var fname = $("#e_fname").val();
	var ptn = /^[a-zA-Zก-์]+$/;
	if (fname.match(ptn)) {
		$("#ew_fname").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
	} else if (fname == "") {
		$("#ew_fname").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
	} else {
		$("#ew_fname").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
		$("#e_fname").val("");
	}
}

function check_lname() {
	var lname = $("#lname").val();
	var ptn = /^[a-zA-Zก-์]+$/;
	$.post("check_lname", { lname: lname }, function (data, status) {
		//alert(data);

		if (data > 0) {
			$("#w_lname").html("<span style='color:red;'>ข้อมูลซ้ำ</span>");
			$("#lname").val("");
		} else {
			if (lname.match(ptn)) {
				$("#w_lname").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
			} else if (lname == "") {
				$("#w_lname").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
			} else {
				$("#w_lname").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
				$("#lname").val("");
			}
		}
	});
}

// แก้นามสกุล
function edit_lname() {
	var lname = $("#e_lname").val();
	var ptn = /^[a-zA-Zก-์]+$/;
	if (lname.match(ptn)) {
		$("#ew_lname").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
	} else if (lname == "") {
		$("#ew_lname").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
	} else {
		$("#ew_lname").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
		$("#e_lname").val("");
	}
}

// เช็ค อีเมล
function check_email() {
	var email = $("#email").val();
	var ptn_email = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{3,3})+$/;
	$.post("chk_email", { email: email }, function (data, status) {
		// alert(data);
		if (data > 0) {
			$("#w_email").html("<span style='color:red;'>ข้อมูลซ้ำ</span>");
			$("#email").val("");
		} else {
			if (email.match(ptn_email)) {
				$("#w_email").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
			} else if (email == "") {
				$("#w_email").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
			} else {
				$("#w_email").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
				$("#email").val("");
			}
		}
	});
}

// แก้ไขอีเมล
function edit_email() {
	var email = $("#e_email").val();
	var ptn_email = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{3,3})+$/;
	if (email.match(ptn_email)) {
		$("#ew_email").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
	} else if (email == "") {
		$("#ew_email").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
	} else {
		$("#ew_email").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
		$("#e_email").val("");
	}
}

// เช้คยูเซอร์
function check_user() {
	var username = $("#username").val();
	var ptn_username = /^[a-zA-Z]+$/;
	$.post("chk_user", { user: username }, function (data, status) {
		// alert(data);
		if (data > 0) {
			$("#w_user").html("<span style='color:red;'>ข้อมูลซ้ำ</span>");
			$("#username").val("");
		} else {
			if (username.match(ptn_username) && username.length >= 8) {
				$("#w_user").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
			} else if (username == "") {
				$("#w_user").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
			} else {
				$("#w_user").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
				$("#username").val("");
			}
		}
	});
}

// แก้ไชยูเซอร์
function edit_user() {
	var username = $("#e_username").val();
	var ptn_username = /^[a-zA-Z]+$/;
	if (username.match(ptn_username) && username.length >= 8) {
		$("#ew_user").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
	} else if (username == "") {
		$("#ew_user").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
	} else {
		$("#ew_user").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
		$("#e_username").val("");
	}
}

// เช็ครหัส
function check_pass() {
	var password = $("#password").val();
	var ptn_pass = /^[0-9]+$/;
	if (password.match(ptn_pass) && password.length >= 8) {
		$("#w_pass").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
	} else if (password == "") {
		$("#w_pass").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
	} else {
		$("#w_pass").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
		$("#password").val("");
	}
}

// แก้ไขรหัส
function edit_password() {
	var password = $("#e_password").val();
	var ptn_pass = /^[0-9a-zA-Z]+$/;
	if (password.match(ptn_pass) && password.length >= 8) {
		$("#ew_password").html("<span style='color:green;'>ข้อมูลถูกต้อง</span>");
	} else if (password == "") {
		$("#ew_password").html("<span style='color:blue;'>กรุณากรอกข้อมูล</span>");
	} else {
		$("#ew_password").html("<span style='color:red;'>ข้อมูลไม่ถูกต้อง</span>");
		$("#e_password").val("");
	}
}

function alert_login() {
	var user = $("#user_login").val();
	var pass = $("#pass_login").val();
	$.post("alert_login", { user: user, pass: pass }, function (data, status) {
		if (data == 1) {
			Swal.fire({
				title: "welcome " + user,
				text: "You login success",
				icon: "success",
				showCancelButton: false,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "OK",
			}).then((result) => {
				if (result.isConfirmed) {
					$("#form_login").submit();
				}
			});
		} else if (data == 2) {
			Swal.fire({
				title: "welcome  " + user,
				text: "You login success",
				icon: "success",
				showCancelButton: false,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "OK",
			}).then((result) => {
				if (result.isConfirmed) {
					$("#form_login").submit();
				}
			});
		} else {
			Swal.fire({
				title: "Error",
				text: "Somting went wrong",
				icon: "error",
				showCancelButton: false,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "OK",
			});
		}
	});
}

function show_pass() {
	var pass = document.getElementById("pass_login");
	if (pass.type === "password") {
		pass.type = "text";
	} else {
		pass.type = "password";
	}
}

function rgt_show() {
	var r_pass = document.getElementById("password");
	if (r_pass.type === "password") {
		r_pass.type = "text";
	} else {
		r_pass.type = "password";
	}
}

function edit_show() {
	var e_pass = document.getElementById("e_password");
	if (e_pass.type === "password") {
		e_pass.type = "text";
	} else {
		e_pass.type = "password";
	}
}

function displayTime() {
	var obj = new Date();
	// alert(obj);
	var h = obj.getHours();
	var m = obj.getMinutes();
	var s = obj.getSeconds();
	if (m < 10) {
		m = "0" + m;
	}
	if (s < 10) {
		s = "0" + s;
	}
	var mydisplay = document.getElementById("clock");
	mydisplay.innerText = h + ":" + m + ":" + s;
	setTimeout("displayTime()", 1000);
}
displayTime();

