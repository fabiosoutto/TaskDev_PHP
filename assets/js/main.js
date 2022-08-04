(function addEventListeners() {
  const navToggler = document.querySelector("nav .nav-toggler");
  if(navToggler) navToggler.addEventListener('click', navToggleHandler);

  const alert = document.querySelectorAll(".alert");
  if(alert.length > 0) {
    alert.forEach(e => {
      e.addEventListener('click', AlertClickHandler);
    });
  }

  const signUpForm = document.getElementById("sign-up-form");
  if(signUpForm) {
    signUpForm.addEventListener('submit', submitSignUpHandler);
  }

  const newTaskForm = document.getElementById("new-task-form");
  if(newTaskForm) {
    newTaskForm.addEventListener('submit', submitNewTaskHandler);
  }

  const menuLinks = document.querySelectorAll('.menu a.menu-link');
  menuLinks.forEach(link => {
    link.addEventListener('click', () => {
      getUserPath();
    });

    const logOutPath = `${location.origin}/task-manager/user_controller.php?action=log-out`;
    if(link.href == logOutPath){
      link.addEventListener('click', () => {
        localStorage.removeItem('previous-page');
      });
    }
  });
})()

function getUserPath() {
  const prevPage = localStorage.getItem('previous-page');

  if(prevPage !== location.href){
    localStorage.setItem('previous-page', location);
  } else {
    localStorage.setItem('previous-page', `${location.origin}/task-manager/home.php`);
  }
}

function goAllTasks() {
  getUserPath();
  location.href = "all_tasks.php";
}

function goNewTask() {
  getUserPath();
  location.href = "new_task.php";
}

function goHome() {
  getUserPath();
  location.href = "home.php";
}

function goCreateAccount() {
  location.href = "index.php?action=sign-up";
}

function goLogin() {
  location.href = "index.php";
}

function goBack() {
  const prevPage = localStorage.getItem('previous-page');
  location.href = prevPage !== location.href && prevPage ? prevPage : 'home.php' ;
  getUserPath();
}

function navToggleHandler() {
  const nav = this.parentNode;
  const navMenu = nav.querySelector(".menu");
  if(navMenu.classList.contains("is-hidden")) {
    navMenu.classList.remove("is-hidden");
  } else {
    navMenu.classList.add("is-hidden");
  }
}

function AlertClickHandler() {
  this.classList.remove('shake');
  this.classList.add('fadeout');
  setTimeout(() => {
    this.remove();
  }, 400);
}

function submitSignUpHandler(e) {
  e.preventDefault();
  const passwd = document.getElementById("passwd-c");
  const passwdConf = document.getElementById("confirm-passwd-c");
  if(passwd.value === passwdConf.value) {
    this.submit();
  } else {
    generateWarningForm(passwd, "the passwords didn't match");
    generateWarningForm(passwdConf);
  }
}

function submitNewTaskHandler(e) {
  e.preventDefault();
  const task = document.getElementById("task");
  const taskText = task.value.trim();

  if(!taskText) {
    generateWarningForm(task, "you must specify your task!")
  } else {
    this.submit();
  }
}

function generateWarningForm(element, message = "") {
  element.classList.add("is-wrong");
  
  const existsWarning = element.parentNode.querySelector('.input-warning');
  if(!existsWarning && message) {
    const warning = document.createElement('small');
    warning.className = "input-warning";
    warning.textContent = message;
    warning.classList.add("is-wrong");
    element.parentNode.insertAdjacentElement("beforeend", warning);
  }
}

function markAsDone(id, pag) {
  location.href=`task_controller.php?action=mark-done&id=${id}&pag=${pag}.php`;
}

function deleteTask(id, pag) {
  location.href=`task_controller.php?action=delete&id=${id}&pag=${pag}.php`;
}

function showModalUpdate(id) {
  const modalWrapper = document.getElementById('modal-update');
  modalWrapper.classList.add('fadein');

  const taskElement = document.getElementById(`task-${id}`);
  const inputId = modalWrapper.querySelector('#id');
  inputId.value = id;
  
  const inputTask = modalWrapper.querySelector('#task');
  const oldTask = taskElement.querySelector('.task-title');
  inputTask.value = oldTask.textContent.trim();
  
  const inputDescription = modalWrapper.querySelector('#description');
  const oldDescription = taskElement.querySelector('.task-desc');
  if(oldDescription) inputDescription.value = oldDescription.textContent.trim();

  modalWrapper.classList.remove('is-hidden');
  inputTask.focus();
  modalWrapper.addEventListener('click', e => {
    if(e.target == modalWrapper) hideModalUpdate();
  })
  document.body.style.overflow = 'hidden';
  scrollTo(0, 0);
}

function hideModalUpdate() {
  const modal = document.getElementById('modal-update');
  modal.classList.add('is-hidden');
  document.body.style.overflow = 'inherit';
}