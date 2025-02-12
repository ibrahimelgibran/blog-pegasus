"use strict";
!(function (e, o) {
  "object" == typeof module && "object" == typeof module.exports
    ? (module.exports = e.document
        ? o(e)
        : function (e) {
            if (!e.document)
              throw new Error("A window with a document is required");
            return o(e);
          })
    : o(e);
})("undefined" != typeof window ? window : this, function (y, e) {
  var o;
  function t(e) {
    var o,
      m = {
        templateSelector: "#CodeBadgeTemplate",
        contentSelector: "body",
        loadDelay: 0,
        copyIconClass: "fa fa-copy",
        copyIconContent: "",
        checkIconClass: "fa fa-check text-success",
        checkIconContent: "",
        onBeforeCodeCopied: null,
      };
    function t() {
      m.loadDelay ? setTimeout(n, loadDelay) : n();
    }
    function n() {
      var e, o, t;
      document.querySelector(m.templateSelector) ||
        (((e = document.createElement("div")).innerHTML = (function () {
          for (
            var e = [
                "<style>",
                "@media print {",
                "   .code-badge { display: none; }",
                "}",
                "    .code-badge-pre {",
                "        position: relative;",
                "    }",
                "    .code-badge-pre .code-badge {",
                "        visibility: hidden;",
                "     }",
                "     .code-badge-pre:hover .code-badge {",
                "         visibility: visible",
                "     }",
                "    .code-badge {",
                "        display: flex;",
                "        flex-direction: row;",
                "        white-space: normal;",
                "        background: transparent;",
                "        background: #333;",
                "        color: white;",
                "        font-size: 0.875em;",
                "        opacity: 0.5;",
                "        transition: opacity linear 0.5s;",
                "        border-radius: 0 0 0 7px;",
                "        padding: 5px 8px 5px 8px;",
                "        position: absolute;",
                "        right: 0;",
                "        top: 0;",
                "    }",
                "    .code-badge.active {",
                "        opacity: 0.8;",
                "    }",
                "",
                "    .code-badge:hover {",
                "        opacity: .95;",
                "    }",
                "",
                "    .code-badge a,",
                "    .code-badge a:hover {",
                "        text-decoration: none;",
                "    }",
                "",
                "    .code-badge-language {",
                "        margin-right: 10px;",
                "        font-weight: 600;",
                "        color: goldenrod;",
                "    }",
                "    .code-badge-copy-icon {",
                "        font-size: 1.2em;",
                "        cursor: pointer;",
                "        padding: 0 7px;",
                "        margin-top:2;",
                "    }",
                "    .fa.text-success:{ color: limegreen !important }",
                "</style>",
                '<div id="CodeBadgeTemplate" style="display:none">',
                '    <div class="code-badge">',
                '        <div class="code-badge-language" >{{language}}</div>',
                '        <div  title="Copy to clipboard">',
                '            <i class="{{copyIconClass}} code-badge-copy-icon"></i></i></a>',
                "        </div>",
                "     </div>",
                "</div>",
              ],
              o = "",
              t = 0;
            t < e.length;
            t++
          )
            o += e[t] + "\n";
          return o;
        })()),
        (o = e.querySelector("style")),
        (t = e.querySelector(m.templateSelector)),
        document.body.appendChild(o),
        document.body.appendChild(t));
      for (
        var n = document.querySelector(m.templateSelector).innerHTML,
          c = document.querySelectorAll("pre>code.hljs"),
          a = 0;
        a < c.length;
        a++
      ) {
        var r = c[a];
        if (!r.querySelector(".code-badge")) {
          for (var d = "", l = 0; l < r.classList.length; l++) {
            var i = r.classList[l];
            if ("language-" === i.substr(0, 9)) {
              d = r.classList[l].replace("language-", "");
              break;
            }
            if ("lang-" === i.substr(0, 5)) {
              d = r.classList[l].replace("lang-", "");
              break;
            }
            if (!d)
              for (var s = 0; s < r.classList.length; s++)
                if ("hljs" != r.classList[s]) {
                  d = r.classList[s];
                  break;
                }
          }
          "ps" == (d = d ? d.toLowerCase() : "text")
            ? (d = "powershell")
            : "cs" == d
            ? (d = "csharp")
            : "js" == d
            ? (d = "javascript")
            : "ts" == d
            ? (d = "typescript")
            : "fox" == d
            ? (d = "foxpro")
            : "txt" == d && (d = "text");
          var p = n
              .replace("{{language}}", d)
              .replace("{{copyIconClass}}", m.copyIconClass)
              .trim(),
            u = document.createElement("div");
          (u.innerHTML = p), (u = u.querySelector(".code-badge"));
          var g = r.parentElement;
          g.classList.add("code-badge-pre"),
            m.copyIconContent &&
              (u.querySelector(".code-badge-copy-icon").innerText =
                m.copyIconContent),
            g.insertBefore(u, r);
        }
      }
      document
        .querySelector(m.contentSelector)
        .addEventListener("click", function (e) {
          return (
            e.srcElement.classList.contains("code-badge-copy-icon") &&
              (e.preventDefault(),
              (e.cancelBubble = !0),
              (function (e) {
                var o = e.srcElement.parentElement.parentElement.parentElement,
                  t = o.querySelector("pre>code"),
                  n = t.textContent || t.innerText;
                m.onBeforeCodeCopied && (n = m.onBeforeCodeCopied(n, t));
                var c = document.createElement("textarea");
                (c.value = n.trim()),
                  document.body.appendChild(c),
                  (c.style.display = "block"),
                  y.document.documentMode
                    ? c.setSelectionRange(0, c.value.length)
                    : c.select();
                document.execCommand("copy"),
                  document.body.removeChild(c),
                  (function (e) {
                    var o = m.copyIconClass.split(" "),
                      t = m.checkIconClass.split(" "),
                      n = e.querySelector(".code-badge-copy-icon");
                    n.innerText = m.checkIconContent;
                    for (var c = 0; c < o.length; c++) n.classList.remove(o[c]);
                    for (c = 0; c < t.length; c++) n.classList.add(t[c]);
                    setTimeout(function () {
                      n.innerText = m.copyIconContent;
                      for (var e = 0; e < t.length; e++)
                        n.classList.remove(t[e]);
                      for (e = 0; e < o.length; e++) n.classList.add(o[e]);
                    }, 2e3);
                  })(o);
              })(e)),
            !1
          );
        });
    }
    (o = e),
      Object.assign(m, o),
      "loading" == document.readyState
        ? document.addEventListener("DOMContentLoaded", t)
        : t();
  }
  "boolean" != typeof o && (o = !1),
    (y.highlightJsBadge = t),
    y.module && y.module.exports && (y.module.exports.highlightJsBadge = t),
    o && t();
});
