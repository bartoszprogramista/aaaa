console.log('regez');
var regImie = /^[a-ząęóćźżśńł]{2,16}$/i;
var regMiasto = /^[a-ząęóćźżśńł]{2,16}$/i;
var regNazw = /^[a-ząęśóżźćńł]{2,20}(\-[a-ząęóżźćńł]{2,20})?$/i;
var regLogin = /^[a-z0-9]{1,25}[a-z0-9]$/i;
var regEmail = /^[a-z0-9][\w\.\-]{1,28}[a-z0-9]\@[a-z0-9]{2,10}\.([a-z0-9]{2,10}\.)?[a-z]{2,3}$/i;
var regHaslo = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W\_]).{8,35})$/;
var regTelefon =  /^\d{9}$/;
var regAdres =  /^[a-ząęółżźćńA-Z0-9\s\.\/,'-]*$/;

var elLogin = document.getElementById('login');//
var elHaslo = document.getElementById('haslo');//
var elImie = document.getElementById('imie');//
var elNazwisko = document.getElementById('nazwisko');//
var elEmail = document.getElementById('email');//
var elMiasto = document.getElementById('miasto');//
var elAdres = document.getElementById('adres');
var elTelefon = document.getElementById('telefon');
var elZmien = document.getElementById('zmien');
var elKomunikat = document.getElementById('komunikat');

elKomunikat.style.visibility = "hidden";

function sprawdzImie(){
    var sprawdz = regImie.test(elImie.value)
    if (sprawdz) {
        elKomunikat.style.visibility = "hidden";
    }else {
        elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędne imię';
        elImie.focus();
    }
}
function sprawdzNazwisko(){
    var sprawdz = regNazw.test(elNazwisko.value)
    if (sprawdz) {
        elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędne nazwisko';
        elNazwisko.focus();
    }
}
function sprawdzLogin(){
    var sprawdz = regLogin.test(elLogin.value)
    if (sprawdz) {
       elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędny login';
        elLogin.focus();
    }
}
function sprawdzHaslo(){
    var sprawdz = regHaslo.test(elHaslo.value)
    if (sprawdz) {
        elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Wymagane mała litera, duża litera, liczba oraz znak specjalny';
        elHaslo.focus();
    }
}
function sprawdzEmail(){
    var sprawdz = regEmail.test(elEmail.value)
    if (sprawdz) {
        elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędny email';
        elEmail.focus();
    }
}
function sprawdzMiasto(){
    var sprawdz = regMiasto.test(elMiasto.value)
    if (sprawdz) {
        elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędny miasto';
        elMiasto.focus();
    }
}
function sprawdzTelefon(){
    var sprawdz = regTelefon.test(elTelefon.value)
    if (sprawdz) {
         elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędny telefon';
        elTelefon.focus();
    }
}
function sprawdzAdres(){
    var sprawdz = regAdres.test(elAdres.value)
    if (sprawdz) {

        elKomunikat.style.visibility = "hidden";
    }else {
      elKomunikat.style.visibility = "visible";
        elKomunikat.textContent = 'Błędny adres';
        elAdres.focus();
    }
}
elImie.addEventListener('blur',sprawdzImie);
elNazwisko.addEventListener('blur',sprawdzNazwisko);
elLogin.addEventListener('blur',sprawdzLogin);
elHaslo.addEventListener('blur',sprawdzHaslo);
elEmail.addEventListener('blur',sprawdzEmail);
elMiasto.addEventListener('blur',sprawdzMiasto);
elAdres.addEventListener('blur',sprawdzAdres);
elTelefon.addEventListener('blur',sprawdzTelefon);
