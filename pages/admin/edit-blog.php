<script src="/public/assets/js/blog.js" defer></script>
<script src="/public/assets/libs/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "#blog-body",
        license_key: "gpl",
    });
</script>
<script src="/public/assets/js/blog.js" defer></script>
<div class="bg-slate-100 mt-[77px] py-3 px-3">
    <!-- <script>
      tinymce.init({
        selector: "textarea",
        plugins: "ai anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown",
        toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
        tinycomments_mode: "embedded",
        tinycomments_author: "Author name",
        mergetags_list: [{
            value: "First.Name",
            title: "First Name",
          },
          {
            value: "Email",
            title: "Email",
          },
        ],
        ai_request: (request, respondWith) =>
          respondWith.string(() =>
            Promise.reject("See docs to implement AI Assistant")
          ),
      });
    </script> -->

    <div class="flex flex-col w-full items-center justify-center gap-4 p-2 md:p-5">

        <span style="font-size: 32px;" class="text-10  font-bold">Modifier la Publication</span>
        <div style=" background-image: url('/assets/images/<?= $blog->cover ?>');
                            height: 250px;
                            background-position: center;
                            /* width: 100%; */
                            background-repeat: no-repeat;
                            background-size: cover;
                            border-radius : 10px;
                            " class="md:w-10/12 w-full bg-center bg-cover bg-no-repeat rounded-mb mb-5"></div>
        <form id="frm-edit-blog" enctype="multipart/form-data" class="flex flex-col md:w-10/12" action="/api/blogs/update" method="post">
            <div class="mb-2">
                <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600"> Title
                    <span class="text-red-500">*</span></label>
                <input id="blog-title" type="text" required name="title" value="<?= $blog->title ?>" class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0" id="exampleInputEmail1" placeholder="Blog Title" />

                <input type="hidden" name="blog_id" value="<?= $blog->id ?>">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">
                    Categorie
                    <span class="text-red-500">*</span></label>
                <select class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0" name="category" id="blog-title" required>
                    <option selected value="<?= $blog->category ?>"><?= $blog->category ?></option>
                    <option value="Article">Article</option>
                    <option value="Rapport">Rapport</option>
                    <option value="Actualite">Actualité</option>
                    <option value="Autre">Autre</option>
                </select>
                <!-- <input id="blog-title" type="text" required name="category" value="" class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0" id="exampleInputEmail1" placeholder="Blog Category" /> -->
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Auteur
                    <span class="text-red-500">*</span></label>
                <input id="blog-author" type="text" required name="author" value="<?= $blog->author ?>" class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0" id="exampleInputEmail1" placeholder="Blog Author" />
            </div>
            <div class="mb-5">
                <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Petite
                    Description <span class="text-red-500">*</span></label>
                <input id="blog-desc" type="text" required name="description" value="<?= $blog->description ?>" class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0" id="exampleInputEmail1" placeholder="Blog Description" />
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Photo de Couverture
                    <span class="text-red-500">*</span></label>
                <input id="blog-cover" type="file" name="cover" class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0" id="exampleInputEmail1" placeholder="Blog Title" />
            </div>
            <div class="mb-2 w-full">
                <textarea id="blog-body" required name="body">
                    <?= $blog->body ?>
                </textarea>
            </div>
            <div class="input-group w-full flex flex-col gap-2">
                <button id="btn-post-blog" class="w-full items-center text-sm bg-primary text-white font-medium leading-6 text-center select-none py-2 px-4 rounded-md transition-all hover:shadow-lg hover:shadow-primary/80">
                    Enregistrer
                </button>
                <button id="post-loader" disabled class="flex w-full items-center justify-center mx-auto mb-6">
                    <a href="#" class="hidden flex items-center justify-center rounded text-xs font-semibold border border-primary text-primary hover:shadow-lg hover:bg-primary hover:text-white hover:shadow-primary/30 focus:shadow-none focus:outline focus:outline-primary/40 px-3 py-2 group"><span class="animate-spin inline-block h-4 w-4 border-2 border-primary border-b-transparent group-hover:border-white group-hover:border-b-transparent rounded-full align-[-.125em] me-2"></span>
                        Posting...</a>
                </button>
            </div>
        </form>
    </div>
</div>