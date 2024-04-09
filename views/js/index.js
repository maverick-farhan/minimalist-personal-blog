const searchInput = document.getElementById("search");
const searchBtn = document.getElementById("submit")
const lightBtn = document.getElementById("light-mode");
const darkBtn = document.getElementById("dark-mode");

lightBtn.addEventListener('click',(e)=>{
document.documentElement.style.setProperty('--light-mode', '#030202');
document.documentElement.style.setProperty('--dark-mode', '#D0CFCF');
e.target.style.display = "none";
darkBtn.style.display = "block";
searchInput.style.borderBottomColor = "#030202";
});

darkBtn.addEventListener('click',(e)=>{
document.documentElement.style.setProperty('--light-mode', '#D0CFCF');
document.documentElement.style.setProperty('--dark-mode', '#030202');
e.target.style.display = "none";
lightBtn.style.display = "block";
searchInput.style.borderBottomColor = "#D0CFCF";
});

searchBtn.addEventListener("mouseover",(e)=>{
    searchInput.style.display="inline-block";
});