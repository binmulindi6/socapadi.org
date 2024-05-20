const form = document.querySelector("#frm-blog");
const btnPost = document.querySelector("#btn-post-blog");
const postLoader = document.querySelector("#post-loader");
const blogTitle = document.querySelector("#blog-title");
const blogAuthor = document.querySelector("#blog-author");
const blogDesc = document.querySelector("#blog-desc");
const blogCover = document.querySelector("#blog-cover");
const blogBody = document.querySelector("#blog-body");

const formEdit = document.querySelector("#frm-edit-blog");

form &&
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    // console.log("Form submitted");
    var myContent = tinymce && tinymce?.get("blog-body")?.getContent();
    postLoader.classList.remove("hidden");
    btnPost.classList.add("hidden");
    // console.log(myContent);
    const formData = new FormData(form);
    // const data = { username: "example" };
    formData.append("body", myContent);
    // console.log(myContent)
    fetch(form.action, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((res) => {
        if (res === "success") {
          alert("blog posted successfully");
          postLoader.classList.add("hidden");
          btnPost.classList.remove("hidden");
          form.reset();
        } else {
          alert(
            "Oups! something went wrong, blog not posted. Please Check your Internet connection."
          );
        }
      })
      .catch((error) => {
        postLoader.classList.add("hidden");
        btnPost.classList.remove("hidden");
        alert(
          "Oups! something went wrong, blog not posted. Please Check your Internet connection."
        );
      });
  });

formEdit &&
  formEdit.addEventListener("submit", (e) => {
    e.preventDefault();
    // console.log("Form submitted");
    var myContent = tinymce && tinymce?.get("blog-body")?.getContent();
    postLoader.classList.remove("hidden");
    btnPost.classList.add("hidden");
    // console.log(myContent);
    const formData = new FormData(formEdit);
    // const data = { username: "example" };
    formData.append("body", myContent);
    // console.log(myContent)
    fetch(formEdit.action, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((res) => {
        if (res === "success") {
          alert("blog edited successfully");
          postLoader.classList.add("hidden");
          btnPost.classList.remove("hidden");
          window.location.assign("/admin/blog");
          // form.reset();
        } else {
          alert(
            "Oups! something went wrong, blog not posted. Please Check your Internet connection."
          );
        }
      })
      .catch((error) => {
        postLoader.classList.add("hidden");
        btnPost.classList.remove("hidden");
        alert(
          "Oups! something went wrong, blog not posted. Please Check your Internet connection."
        );
      });
  });

// btnPost.addEventListener("click", (e) => {});
