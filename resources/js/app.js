import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

//delete modal
const deleteSubmitButtons = document.querySelectorAll('.delete-button');
deleteSubmitButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute('data-item-title');

        const modal = document.getElementById('deleteModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector('#modal-item-title');
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector('button.btn-primary');

        buttonDelete.addEventListener('click', () => {
            button.parentElement.submit();
        })
    })
});

//Toggle admin table tilt effect
if(document.querySelector('.index-table') && document.querySelector('.table-inner')){
    (function() {
        var container = document.querySelector(".index-table"),
            inner = document.querySelector(".table-inner");
        var mouse = {
          _x: 0,
          _y: 0,
          x: 0,
          y: 0,
          updatePosition: function(event) {
            var e = event || window.event;
            this.x = e.clientX - this._x;
            this.y = (e.clientY - this._y) * - 1;
          },
          setOrigin: function(e) {
            this._x = e.offsetLeft + Math.floor(e.offsetWidth / 2);
            this._y = e.offsetTop + Math.floor(e.offsetHeight / 2);
          },
          show: function() {
            return "(" + this.x + ", " + this.y + ")";
          }
        };

        mouse.setOrigin(container);

        var counter = 0;
        var refreshRate = 10;
        var isTimeToUpdate = function() {
          return counter++ % refreshRate === 0;
        };

        var onMouseEnterHandler = function(event) {
          update(event);
        };

        var onMouseLeaveHandler = function() {
          inner.style = "";
        };

        var onMouseMoveHandler = function(event) {
          if (isTimeToUpdate()) {
            update(event);
          }
        };

        var update = function(event) {
          mouse.updatePosition(event);
          updateTransformStyle(
            (mouse.y / inner.offsetHeight / 2).toFixed(2),
            (mouse.x / inner.offsetWidth / 2).toFixed(2)
          );
        };

        var updateTransformStyle = function(x, y) {
          var style = "rotateX(" + x + "deg) rotateY(" + y + "deg)";
          inner.style.transform = style;
          inner.style.webkitTransform = style;
          inner.style.mozTranform = style;
          inner.style.msTransform = style;
          inner.style.oTransform = style;
        };

        container.onmousemove = onMouseMoveHandler;
        container.onmouseleave = onMouseLeaveHandler;
        container.onmouseenter = onMouseEnterHandler;
      })();
}

//alert fx
if(document.querySelector('.icon-change')){
    const alertIconHTML = document.querySelector('.icon-change');
    setTimeout(()=>{
        alertIconHTML.innerHTML = `<i class="fa-solid fa-check"></i>`
    }, 2500)
}

//pic-preview in admin.projects.create
if(document.getElementById('project_image') && document.getElementById('uploadPreview')){
    const previewImage = document.getElementById('project_image');
    previewImage.addEventListener('change', (event) =>{
    var oFReader = new FileReader();
    oFReader.readAsDataURL(previewImage.files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
});
}

let form = getElementById('createForm');

form.submit((e)=>{
    e.preventDefault();
    let values = $(this).serializeArray();
    values.forEach((item,index)=>{
        $('#submitted').append(item.name + ' ' + item.value + '<br>')
    })
    localStorage.setItem(form, JSON.stringify(values));
})
