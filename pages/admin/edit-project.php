<script src="/public/assets/js/project.js" defer></script>
<script src="/public/assets/libs/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "#blog-body",
    license_key: "gpl",
});
</script>
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
        <div style=" background-image: url('/assets/images/<?= $project->cover ?>');
                            height: 250px;
                            background-position: center;
                            /* width: 100%; */
                            background-repeat: no-repeat;
                            background-size: cover;
                            border-radius : 10px;
                            " class="md:w-10/12 w-full bg-center bg-cover bg-no-repeat rounded-mb mb-5"></div>
        <form id="frm-edit-blog" enctype="multipart/form-data" class="flex flex-col md:w-10/12"
            action="/api/projects/update" method="post">
            <div class="flex flex-col md:flex-row gap-2">
                <div class="mb-2 w-full">
                    <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Nom du Projet
                        <span class="text-red-500">*</span></label>
                    <input type="hidden" name="project_id" value="<?= $project->id ?>">
                    <input id="blog-title" type="text" required name="name" value="<?= $project->name ?>"
                        class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0"
                        id="exampleInputEmail1" placeholder="Nom du Projet" />
                </div>
                <div class="mb-2 w-full">
                    <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Partenaire
                        <span class="text-red-500">*</span></label>
                    <input id="blog-title" type="text" required name="partenaire" value="<?= $project->partenaire ?>"
                        class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0"
                        id="exampleInputEmail1" placeholder="Partenaire" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-2">
                <div class="mb-2 w-full">
                    <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Date Debut
                        <span class="text-red-500">*</span></label>
                    <input id="blog-title" value="<?= $project->debut ?>" type="date" required name="debut"
                        class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0"
                        id="exampleInputEmail1" placeholder="Date Debut" />
                </div>
                <div class="mb-2 w-full">
                    <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Date
                        Fin</label>
                    <input id="blog-title" type="date" value="<?= $project->fin ?>" name="fin"
                        class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0"
                        id="exampleInputEmail1" placeholder="Date Fin" />
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-2">
                <div class="mb-2 w-full">
                    <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Etat du Projet
                        <span class="text-red-500">*</span></label>
                    <select
                        class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0"
                        name="state" id="blog-title" required>
                        <option selected value="<?= $project->state ?>"><?= $project->state ?></option>
                        <option value="Encours">Encours</option>
                        <option value="Réalisé">Réalisé</option>
                    </select>
                </div>

                <div class="mb-2 w-full">
                    <label for="exampleInputEmail1" class="block text-sm font-medium mb-1 text-gray-600">Photo de
                        Couverture
                        <input id="blog-cover" type="file" name="cover"
                            class="py-2 px-4 leading-6 block w-full border-gray-300 rounded text-sm focus:border-gray-300 focus:ring-0"
                            id="exampleInputEmail1" placeholder="Blog Title" />
                </div>
            </div>
            <div class="mb-2 w-full">
                <textarea id="blog-body" required name="body">
                    <?= $project->body ?>
                </textarea>
            </div>
            <div class="input-group w-full flex flex-col gap-2">
                <button id="btn-post-blog"
                    class="w-full items-center text-sm bg-primary text-white font-medium leading-6 text-center select-none py-2 px-4 rounded-md transition-all hover:shadow-lg hover:shadow-primary/80">
                    Enregistrer
                </button>
                <button id="post-loader" disabled class="flex w-full items-center justify-center mx-auto mb-6">
                    <a href="#"
                        class="hidden flex items-center justify-center rounded text-xs font-semibold border border-primary text-primary hover:shadow-lg hover:bg-primary hover:text-white hover:shadow-primary/30 focus:shadow-none focus:outline focus:outline-primary/40 px-3 py-2 group"><span
                            class="animate-spin inline-block h-4 w-4 border-2 border-primary border-b-transparent group-hover:border-white group-hover:border-b-transparent rounded-full align-[-.125em] me-2"></span>
                        Posting...</a>
                </button>
            </div>
        </form>
    </div>
</div>