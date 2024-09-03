function updateTime() {
    const now = new Date();
    const timeElement = document.getElementById('time');
    const dateElement = document.getElementById('date');

    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const formattedTime = `${hours}:${minutes}:${seconds}`;

    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString('en-US', options);

    timeElement.textContent = formattedTime;
    dateElement.textContent = formattedDate;
}


setInterval(updateTime, 1000);

updateTime();



function stnum() {
    var stnum = document.getElementById("STNum");


    var f = new FormData();

    f.append("stNum", stnum.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {

        if (r.readyState == 4 && r.status == 200) {
            var t = this.responseText;


            if (t == "Please Enter the Style Number") {

                window.location.reload();
            } else {

                document.getElementById("table").innerHTML = t
            }






        }

    }


    r.open("POST", "searchProcess.php", true);
    r.send(f);



}

function mstnum(mid) {
    var stnum = document.getElementById("MSTNum");
    var Mid = mid;


    var f = new FormData();

    f.append("stNum", stnum.value);
    f.append("Mid", Mid);




    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {

        if (r.readyState == 4 && r.status == 200) {
            var t = this.responseText;


            if (t == "Please Enter the Style Number") {

                window.location.reload();
            } else {

                document.getElementById("mtable").innerHTML = t
            }






        }

    }


    r.open("POST", "mSearchProcess.php", true);
    r.send(f);



}

function loadStyle(st_num) {
    var st_num = st_num;

    window.location = "style.php?st_num=" + st_num;
}


function cuttingLogin() {

    var e = document.getElementById("e");
    var pw = document.getElementById("pw");


    var f = new FormData();

    f.append("e", e.value);
    f.append("pw", pw.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {

        if (r.readyState == 4 && r.status == 200) {
            var t = this.responseText;


            if (t == "Success") {
                window.location = "dashboard.php";


            } else {

                alert(t);

            }





        }

    }


    r.open("POST", "logInProcess.php", true);
    r.send(f);





}

function change() {
    document.getElementById("reg").classList.toggle("d-none");
    document.getElementById("log").classList.toggle("d-none");




}

function cuttingReg() {


    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e2");
    var p = document.getElementById("pw2");
    var rpw = document.getElementById("rpw");


    var form = new FormData();
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("rpw", rpw.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location.reload();


            } else {
                alert(text);

            }


        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(form);

}

function forgotPassword() {

    var email = document.getElementById("e");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Password has sent to your Email. Please check your inbox");


            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}
function showPassword1() {

    var i = document.getElementById("pw");
    var eye = document.getElementById("eye1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash icon";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye icon";
    }

}

function showPassword2() {

    var i = document.getElementById("pw2");
    var eye = document.getElementById("eye2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash icon2";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye icon2";
    }

}
function showPassword3() {

    var i = document.getElementById("rpw");
    var eye = document.getElementById("eye3");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash icon2";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye icon2";
    }

}

function merLogin() {

    var e = document.getElementById("me");
    var pw = document.getElementById("mpw");


    var f = new FormData();

    f.append("e", e.value);
    f.append("pw", pw.value);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {

        if (r.readyState == 4 && r.status == 200) {
            var t = this.responseText;


            if (t == "Success") {
                window.location = "mdashboard.php?me=" + e.value;


            } else {

                alert(t);

            }





        }

    }


    r.open("POST", "mlogInProcess.php", true);
    r.send(f);





}
function mforgotPassword() {

    var email = document.getElementById("me");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Success") {

                alert("Password has sent to your Email. Please check your inbox");


            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "mforgotPasswordProcess.php?me=" + email.value, true);
    r.send();

}
function mReg() {


    var f = document.getElementById("mf");
    var l = document.getElementById("ml");
    var e = document.getElementById("me2");
    var p = document.getElementById("mpw2");
    var rpw = document.getElementById("mrpw");


    var form = new FormData();
    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("rpw", rpw.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                window.location.reload();
            } else {
                alert(text);

            }


        }
    }

    r.open("POST", "msignUpProcess.php", true);
    r.send(form);

}

function mshowPassword1() {

    var i = document.getElementById("mpw");
    var eye = document.getElementById("meye1");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash icon";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye icon";
    }

}

function mshowPassword2() {

    var i = document.getElementById("mpw2");
    var eye = document.getElementById("meye2");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash icon2";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye icon2";
    }

}
function mshowPassword3() {

    var i = document.getElementById("mrpw");
    var eye = document.getElementById("meye3");

    if (i.type == "password") {
        i.type = "text";
        eye.className = "bi bi-eye-slash icon2";
    } else {
        i.type = "password";
        eye.className = "bi bi-eye icon2";
    }

}
function changeStatus(email) {

    var e = email;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                window.location.reload();

            } else if (t == "activated") {

                window.location.reload();

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "changeStatusProcess.php?e=" + e, true);
    r.send();

}

function changeStatusMer(email) {

    var e = email;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "deactivated") {

                window.location.reload();

            } else if (t == "activated") {

                window.location.reload();

            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "changeStatusMerProcess.php?e=" + e, true);
    r.send();

}

function addCutQty(st_id) {

    var ref = document.getElementById("ref").value;
    var cutQty = document.getElementById("cutQty").value;
    var st_id = st_id;


    var form = new FormData();


    form.append("ref", ref);
    form.append("cutQty", cutQty);
    form.append("st_id", st_id);



    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var text = r.responseText;

            // if (text == "Success") {
            document.getElementById("ref").value = '0';


            document.getElementById("cutQty").value = '';
            document.getElementById("tot").innerHTML = text;








            // } else {
            //    alert(text);

            // }


        }
    }

    r.open("POST", "addCutQty.php", true);
    r.send(form);



}

function changeImage() {
    var viwe = document.getElementById("viweImg");
    var file = document.getElementById("image");

    file.onchange = function () {
        var img = this.files[0];
        var url = window.URL.createObjectURL(img);

        viwe.style.width = "100%";
        viwe.style.height = "45vh";
        viwe.src = url;
    }
};

function addFab(styleNum) {
    var sy = styleNum
    var ref = document.getElementById("ref");
    var colour = document.getElementById("colour");
    var fabQty = document.getElementById("fabQty");
    var orderQty = document.getElementById("orderQty");



 


    var form = new FormData();


    form.append("ref", ref.value);
    form.append("colour", colour.value);
    form.append("fabQty", fabQty.value);
    form.append("orderQty", orderQty.value);
    form.append("styleNum", sy);


  
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
           
               document.getElementById("row").innerHTML=t
          
        }
    }


    r.open("POST", "addFabProcess.php", true);
    r.send(form);


  

}

function addSt(mid) {



    window.location = 'addNewStyle.php?mid=' + mid;




}



function addStyle(mid) {

    var Mid = mid;
    var image = document.getElementById("image");
    var style_num = document.getElementById("style_num");
    var fac = document.getElementById("fac");
    var fab_con = document.getElementById("fab_con");
    var fus = document.getElementById("fus");
    var designer = document.getElementById("designer");
    var item = document.getElementById("item");
    var match = document.getElementById("match");
    var pipine_width = document.getElementById("pipine_width");
    var pipine_way = document.getElementById("pipine_way");
    var pipine_con = document.getElementById("pipine_con");


    var form = new FormData();


    form.append("style_num", style_num.value);
    form.append("fac", fac.value);
    form.append("fab_con", fab_con.value);
    form.append("fus", fus.value);
    form.append("designer", designer.value);
    form.append("item", item.value);
    form.append("match", match.value);
    form.append("pipine_width", pipine_width.value);
    form.append("pipine_way", pipine_way.value);
    form.append("pipine_con", pipine_con.value);
    form.append("Mid", Mid);


    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

        if (confirmation) {
            alert("you have not selected any image.");
        }

    } else {
        form.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }


    r.open("POST", "addNewStyleProcess.php", true);
    r.send(form);

}


function adminLogin(email){
    document.getElementById('verificationModel').show
}







