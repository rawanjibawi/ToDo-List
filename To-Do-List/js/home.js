function CheckInput(event){
    let input=document.getElementById('list').value.trim();
    if(input===''){
        event.preventDefault();
        document.getElementById('list').placeholder="This Field can't be empty!";
        document.getElementById("list").style.borderColor = "red";
    }
}
function toggleDescription(event) {
  let content = event.target.nextElementSibling;
  content.classList.toggle("show");
}
let descriptions = document.querySelectorAll(".description");
    descriptions.forEach(function (description) {
  description.addEventListener("click", toggleDescription);
});

function toggleContent(event) {
  let content = event.target.nextElementSibling;
  content.style.display = content.style.display === "none" ? "block" : "none";
}
let contents = document.querySelectorAll(".content");
contents.forEach(function (content) {
  content.style.display = "none"; // Hide content initially
  content.previousElementSibling.addEventListener("click", toggleContent);
});

