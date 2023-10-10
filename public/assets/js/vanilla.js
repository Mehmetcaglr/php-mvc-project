document.getElementById("show-input-button").addEventListener("click", function() {
    document.getElementById("input-container").style.display = "block";
    document.getElementById("new-gender").style.display = "block";
    document.getElementById("save-button").style.display = "block";
});



document.getElementById("save-button").addEventListener("click", function() {
    var inputValue = document.getElementById("dynamic-input").value;
    alert("Kaydedilen Değer: " + inputValue);
});


document.getElementById("silButton").addEventListener("click", function()
{
    var selectGender = document.querySelectorAll('#selectGender');
    var checkboxes = document.querySelectorAll('#kullaniciCheckbox');
    var seciliKullanicilar = [];


    selectGender.forEach(function (checkbox) {
        if (checkbox.checked) {
            selectGender.forEach(function (td) {
                seciliKullanicilar.push(td.value);

            })
        }
    });



    console.log(seciliKullanicilar);



    return seciliKullanicilar;
});