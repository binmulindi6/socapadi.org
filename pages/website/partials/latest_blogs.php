<section class="gray-boxed-wrapper home-one__boxed">
    <img src="/assets/images/icons/home-1-blog-bg.png" alt="" class="home-one__boxed-bg">
    <section class="blog-home-two blog-home-one">
        <div class="container">
            <div class="row top-row">
                <div class="col-lg-6">
                    <div class="block-title">
                        <div class="block-title__image"></div><!-- /.block-title__image -->
                        <p>Extrait du billet des nos Articles</p>
                        <h3>Dernières Publications et Articles</h3>
                    </div><!-- /.block-title -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <p class="block-text">Nous aspirons à un avenir où les pratiques agricoles et pastorales contribuent
                        à la préservation des écosystèmes tout en améliorant les moyens de subsistance des membres de la
                        coopérative.</p>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <div id="blogs" class="row">


                <script>
                    const root = document.getElementById("blogs");
                    const loadData = (root) =>
                        (root.innerHTML = `
              <span class="loader"></span>
              <span class="loader hidden md:block"></span>
              <span class="loader hidden md:block"></span>
              `);
                    fetch("/api/blogs/latest")
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
                                    container += `    
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
                    </div>`;
                                }
                            );

                            root.innerHTML = container;
                        })
                        .catch((err) => console.error(err));

                    loadData(root);
                </script>

            </div><!-- /.row -->
            <hr />
        </div><!-- /.container -->
    </section><!-- /.blog-home-two -->
    <div class="blog-home__slogan">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-home__slogan-main">
                        <i class="agrikon-icon-farm"></i>
                        <div class="blog-home__slogan-content">
                            <h3>Nous avons comme Mission de</h3>
                            <p>« Créer une communauté agro-pastorale durable et résiliente qui harmonise le
                                développement économique avec la conservation de l’environnement ».</p>
                        </div><!-- /.blog-home__slogan-content -->
                    </div><!-- /.blog-home__slogan-main -->
                </div><!-- /.col-lg-9 -->
                <div class="col-lg-3">
                    <div class="blog-home__slogan-image">
                        <img src="/assets/images/resources/blog-cta-1.png" alt="">
                    </div><!-- /.blog-home__slogan-image -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.blog-home__slogan -->
</section><!-- /.gray-boxed-wrapper -->