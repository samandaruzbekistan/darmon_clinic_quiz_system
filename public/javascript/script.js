

const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
      sidebar = body.querySelector("nav");
      sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if(getMode && getMode ==="dark"){
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});

sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})






//1-modal uchun js kod


const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const openModalBtn = document.querySelector(".btn-open");
const closeModalBtn = document.querySelector(".btn-close");

// close modal function
const closeModal = function () {
  modal.classList.add("hidden");
  overlay.classList.add("hidden");
};

// close the modal when the close button and overlay is clicked
closeModalBtn.addEventListener("click", closeModal);
overlay.addEventListener("click", closeModal);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden")) {
    closeModal();
  }
});

// open modal function
const openModal = function () {
  modal.classList.remove("hidden");
  overlay.classList.remove("hidden");
};
// open modal event
openModalBtn.addEventListener("click", openModal);







//2-modal uchun js kod

const modal1 = document.querySelector(".modal1");
const overlay1 = document.querySelector(".overlay1");
const openModalBtn1 = document.querySelector(".btn-open1");
const closeModalBtn1 = document.querySelector(".btn-close1");

// close modal function
const closeModal1 = function () {
  modal1.classList.add("hidden1");
  overlay1.classList.add("hidden1");
};

// close the modal when the close button and overlay is clicked
closeModalBtn1.addEventListener("click", closeModal1);
overlay1.addEventListener("click", closeModal1);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden1")) {
    closeModal1();
  }
});

// open modal function
const openModal1 = function () {
  modal1.classList.remove("hidden1");
  overlay1.classList.remove("hidden1");
};
// open modal event
openModalBtn1.addEventListener("click", openModal1);


//3-modal uchun js kod

const modal2 = document.querySelector(".modal2");
const overlay2 = document.querySelector(".overlay2");
const openModalBtn2 = document.querySelector(".btn-open2");
const closeModalBtn2 = document.querySelector(".btn-close2");

// close modal function
const closeModal2 = function () {
  modal2.classList.add("hidden2");
  overlay2.classList.add("hidden2");
};

// close the modal when the close button and overlay is clicked
closeModalBtn2.addEventListener("click", closeModal2);
overlay2.addEventListener("click", closeModal2);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden2")) {
    closeModal2();
  }
});

// open modal function
const openModal2 = function () {
  modal2.classList.remove("hidden2");
  overlay2.classList.remove("hidden2");
};
// open modal event
openModalBtn2.addEventListener("click", openModal2);



//3-modal uchun js kod

const modal3 = document.querySelector(".modal3");
const overlay3 = document.querySelector(".overlay3");
const openModalBtn3 = document.querySelector(".btn-open3");
const closeModalBtn3 = document.querySelector(".btn-close3");

// close modal function
const closeModal3 = function () {
  modal3.classList.add("hidden3");
  overlay3.classList.add("hidden3");
};

// close the modal when the close button and overlay is clicked
closeModalBtn3.addEventListener("click", closeModal3);
overlay3.addEventListener("click", closeModal3);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden3")) {
    closeModal3();
  }
});

// open modal function
const openModal3 = function () {
  modal3.classList.remove("hidden3");
  overlay3.classList.remove("hidden3");
};
// open modal event
openModalBtn3.addEventListener("click", openModal3);


//4-modal uchun js kod

const modal4 = document.querySelector(".modal4");
const overlay4 = document.querySelector(".overlay4");
const openModalBtn4 = document.querySelector(".btn-open4");
const closeModalBtn4 = document.querySelector(".btn-close4");

// close modal function
const closeModal4 = function () {
  modal4.classList.add("hidden4");
  overlay4.classList.add("hidden4");
};

// close the modal when the close button and overlay is clicked
closeModalBtn4.addEventListener("click", closeModal4);
overlay4.addEventListener("click", closeModal4);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden4")) {
    closeModal4();
  }
});

// open modal function
const openModal4 = function () {
  modal4.classList.remove("hidden4");
  overlay4.classList.remove("hidden4");
};
// open modal event
openModalBtn4.addEventListener("click", openModal4);



//5-modal uchun js kod

const modal5 = document.querySelector(".modal5");
const overlay5 = document.querySelector(".overlay5");
const openModalBtn5 = document.querySelector(".btn-open5");
const closeModalBtn5 = document.querySelector(".btn-close5");

// close modal function
const closeModal5 = function () {
  modal5.classList.add("hidden5");
  overlay5.classList.add("hidden5");
};

// close the modal when the close button and overlay is clicked
closeModalBtn5.addEventListener("click", closeModal5);
overlay5.addEventListener("click", closeModal5);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden5")) {
    closeModal5();
  }
});

// open modal function
const openModal5 = function () {
  modal5.classList.remove("hidden5");
  overlay5.classList.remove("hidden5");
};
// open modal event
openModalBtn5.addEventListener("click", openModal5);




//6-modal uchun js kod

const modal6 = document.querySelector(".modal6");
const overlay6 = document.querySelector(".overlay6");
const openModalBtn6 = document.querySelector(".btn-open6");
const closeModalBtn6 = document.querySelector(".btn-close6");

// close modal function
const closeModal6 = function () {
  modal6.classList.add("hidden6");
  overlay6.classList.add("hidden6");
};

// close the modal when the close button and overlay is clicked
closeModalBtn6.addEventListener("click", closeModal6);
overlay6.addEventListener("click", closeModal6);

// close modal when the Esc key is pressed
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modal.classList.contains("hidden6")) {
    closeModal6();
  }
});

// open modal function
const openModal6 = function () {
  modal6.classList.remove("hidden6");
  overlay6.classList.remove("hidden6");
};
// open modal event
openModalBtn6.addEventListener("click", openModal6);






