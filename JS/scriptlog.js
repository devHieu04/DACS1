const form = document.getElementById("login-form");
const email = document.getElementById("email");
const password = document.getElementById("password");

form.addEventListener("submit", (event) => {
  event.preventDefault();

  if (email.value === "" || password.value === "") {
    alert("Vui lòng điền đầy đủ thông tin.");
  } else if (email.value !== "example@gmail.com" || password.value !== "password") {
    alert("Email hoặc mật khẩu không đúng.");
  } else {
    alert("Đăng nhập thành công!");
    form.reset();
  }
});

const registerLink = document.getElementById("register-link");
registerLink.addEventListener("click", () => {
  alert("Chức năng đăng ký chưa được cài đặt.");
});
