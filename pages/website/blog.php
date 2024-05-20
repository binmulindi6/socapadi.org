<?php require('partials/head.php'); ?>
<section class="page-header">
    <div class="page-header__bg" style="background-image: url(assets/images/backgrounds/page-header-bg-1-1.jpg);"></div>
    <!-- /.page-header__bg -->
    <div class="container">
        <ul class="thm-breadcrumb list-unstyled">
            <li><a href="/">Acceuil</a></li>
            <li>/</li>
            <li><span>Publications</span></li>
        </ul><!-- /.thm-breadcrumb list-unstyled -->
        <h2><?= $title ?></h2>
    </div><!-- /.container -->
</section><!-- /.page-header -->

<section class="blog-grid">
    <div class="container">
        <div id="blogs" class="row">


            <script>
                const root = document.getElementById("blogs");
                const loadData = (root) =>
                    (root.innerHTML = `
                 <div class="col-md-6 col-lg-4"> 
                 <span class="loader blog-card"></span>
                 </div>
                 <div class="col-md-6 col-lg-4"> 
                 </div>
                 <div class="col-md-6 col-lg-4"> 
                 <span class="loader blog-card"></span>
                </div>
                <span class="loader blog-card"></span>
                </div>
              `);
                fetch("/api/blogs")
                    .then((res) => {
                        return res.json();
                    })
                    .then((blogs) => {
                        let container = ``;
                        blogs.forEach(
                            ({
                                id,
                                title,
                                category,
                                description,
                                cover,
                                author,
                                created_at,
                            }) => {

                                container += category === "<?= $category ?>" ?
                                    `    
                         <div class="col-md-6 col-lg-4">                
                        <div class="blog-card">
                        
                         <div
                                  style="background-image: url('/assets/images/${cover}');     
                                  height: 200px;
                                  background-position: center;
                                  width: 100%;
                                  background-repeat: no-repeat;
                                  background-size: cover;
                                  border-radius : 10px;
                                  "
                                  class="blog-card__image bg-center bg-cover bg-no-repeat rounded-mb"
                                ></div>
                        <div class="blog-card__content">
                            <div class="blog-card__date">${new Date(
                              created_at
                            ).getDate() + " " + new Date(
                              created_at
                            ).toDateString().split(' ')[1]}</div>
                            <div class="blog-card__meta">
                                <a href="blog-details"><i class="far fa-user-circle"></i> ${author}</a>
                                <a href="blog-details"><i class="far fa-comments"></i>${category}</a>
                            </div>
                            <h3><a href="#">${title}</a></h3>
                            <a href="/show/${category.toLowerCase()}s/${id}" class="thm-btn">Lire Plus</a>
                        </div>
                        </div>
                    </div>` : ``;
                            }
                        );

                        root.innerHTML = container.length > 1 ? container :
                            `<h3 class="text-center w-100">Pas de Publications pour l'instant</h3>`;
                    })
                    .catch((err) => console.error(err));

                loadData(root);
            </script>

        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.blog-grid -->
<?php require('partials/footer.php') ?>