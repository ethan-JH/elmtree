<footer class="text-muted">
      <div class="container">
        <p><strong>© ELMTREE 2019</strong></p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
			/*!
		 * bsCustomFileInput v1.3.1 (https://github.com/Johann-S/bs-custom-file-input)
		 * Copyright 2018 Johann-S <johann.servoire@gmail.com>
		 * Licensed under MIT (https://github.com/Johann-S/bs-custom-file-input/blob/master/LICENSE)
		 */
		!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.bsCustomFileInput=t()}(this,function(){"use strict";var d={CUSTOMFILE:'.custom-file input[type="file"]',CUSTOMFILELABEL:".custom-file-label",FORM:"form",INPUT:"input"},r=function(e){if(0<e.childNodes.length)for(var t=[].slice.call(e.childNodes),n=0;n<t.length;n++){var r=t[n];if(3!==r.nodeType)return r}return e},u=function(e){var t=e.bsCustomFileInput.defaultText,n=e.parentNode.querySelector(d.CUSTOMFILELABEL);n&&(r(n).innerHTML=t)},n=!!window.File,l=function(e){if(e.hasAttribute("multiple")&&n)return[].slice.call(e.files).map(function(e){return e.name}).join(", ");if(-1===e.value.indexOf("fakepath"))return e.value;var t=e.value.split("\\");return t[t.length-1]};function v(){var e=this.parentNode.querySelector(d.CUSTOMFILELABEL);if(e){var t=r(e),n=l(this);n.length?t.innerHTML=n:u(this)}}function p(){for(var e=[].slice.call(this.querySelectorAll(d.INPUT)).filter(function(e){return!!e.bsCustomFileInput}),t=0,n=e.length;t<n;t++)u(e[t])}var m="bsCustomFileInput",L="reset",h="change";return{init:function(e,t){void 0===e&&(e=d.CUSTOMFILE),void 0===t&&(t=d.FORM);for(var n,r,l,i=[].slice.call(document.querySelectorAll(e)),o=[].slice.call(document.querySelectorAll(t)),u=0,c=i.length;u<c;u++){var f=i[u];Object.defineProperty(f,m,{value:{defaultText:(n=f,r=void 0,void 0,r="",l=n.parentNode.querySelector(d.CUSTOMFILELABEL),l&&(r=l.innerHTML),r)},writable:!0}),f.addEventListener(h,v)}for(var a=0,s=o.length;a<s;a++)o[a].addEventListener(L,p),Object.defineProperty(o[a],m,{value:!0,writable:!0})},destroy:function(){for(var e=[].slice.call(document.querySelectorAll(d.FORM)).filter(function(e){return!!e.bsCustomFileInput}),t=[].slice.call(document.querySelectorAll(d.INPUT)).filter(function(e){return!!e.bsCustomFileInput}),n=0,r=t.length;n<r;n++){var l=t[n];u(l),l[m]=void 0,l.removeEventListener(h,v)}for(var i=0,o=e.length;i<o;i++)e[i].removeEventListener(L,p),e[i][m]=void 0}}});
		//# sourceMappingURL=bs-custom-file-input.min.js.map
	</script>
	<script>
      document.addEventListener('DOMContentLoaded', function() {
        bsCustomFileInput.init()

        var btn = document.getElementById('btnResetForm')
        var form = document.querySelector('form')
        btn.addEventListener('click', function() {
          form.reset()
        })
      });
    </script>
	<script>
      $(function () {
        Holder.addTheme("thumb", { background: "#55595c", foreground: "#eceeef", text: "Thumbnail" });
      });
    </script>
	<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<script>
			// script to show selected file name in file selector
            $('#customfile').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
    </script>
	

<svg xmlns="http://www.w3.org/2000/svg" width="156" height="280" viewBox="0 0 156 280" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="14" style="font-weight:bold;font-size:14pt;font-family:Arial, Helvetica, Open Sans, sans-serif">156x280</text></svg></body></html>