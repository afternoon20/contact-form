// フロントのバリデーション
// (function () {
//   'use strict';
//   window.addEventListener(
//     'load',
//     function () {
//       // Fetch all the forms we want to apply custom Bootstrap validation styles to
//       var forms = document.getElementsByClassName('needs-validation');
//       // Loop over them and prevent submission
//       var validation = Array.prototype.filter.call(forms, function (form) {
//         form.addEventListener(
//           'submit',
//           function (event) {
//             if (form.checkValidity() === false) {
//               event.preventDefault();
//               event.stopPropagation();
//             }
//             form.classList.add('was-validated');
//           },
//           false
//         );
//       });
//     },
//     false
//   );
// })();

// トップボタン押下
$(function () {
  var home = $('.header__link');
  home.click(function () {
    var bool = window.confirm('このサイトを離れますか？\n行った変更が保存されない可能性があります。');
    if (bool) {
      window.location.href = 'topForm.php';
    }
  });
});

//送信ボタン押下
$(function () {
  var send = $('#send');
  var sending = $('#sending');
  var back = $('#back');
  sending.css({ display: 'none' });
  send.click(function () {
    back.attr('disabled', '');
    back.css({ cursor: 'wait' });
    send.css({ display: 'none' });
    send.css({ display: 'none' });
    sending.css({ display: 'block' });
  });
});
