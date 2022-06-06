
    function Get_Province(region_code) {
        var x = document.getElementById("province");
        var y = document.getElementById("citymun");
        var z = document.getElementById("barangay");


        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            x.innerHTML = this.responseText;
            y.innerHTML = '<select  name="txt_Citymunicipality" class="civilstatus"><option disabled selected>City/Municipality</option></select>';
            z.innerHTML = '<select  name="txt_Barangay" class="civilstatus"><option disabled selected>Barangay</option></select>';


        }
        xhttp.open("GET", "API/API_province.php?region=" + region_code);
        xhttp.send();
    }

    function Get_CityMun(province_code) {
        var x = document.getElementById("citymun");
        var y = document.getElementById("s_region");
        var z = document.getElementById("barangay");
        var region_code = y.value;

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            x.innerHTML = this.responseText;
            z.innerHTML = '<select  name="txt_Barangay" class="civilstatus"><option disabled selected>Barangay</option></select>';

        }
        xhttp.open("GET", "API/API_citymun.php?region=" + region_code + "&province=" + province_code);
        xhttp.send();
    }

    function Get_Barangay(citymun_code) {
        var x = document.getElementById("barangay");
        var y = document.getElementById("s_province");
        var z = document.getElementById("s_region");
        var province_code = y.value;

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            x.innerHTML = this.responseText;

        }
        xhttp.open("GET", "API/API_barangay.php?province=" + province_code + "&citymun=" + citymun_code);
        xhttp.send();
    }
