<?php

use App\Component\Component;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="easyChik : Système automatisé de Gestion des Etablissement Scolaires">
  <meta name="keywords" content="easyChik, EasyChik, easychik, easy chik, Easy Chik">
  <meta name="google-site-verification" content="kshYECkpi8M8ueo-W8qZZQrAvxwzgXdYHajloTGYxCo">
  <link rel="canonical" href="https://easychik.com">
  <meta name="robots" content="index, follow">
  <meta name="googlebot" content="easyChik,easychik">

  <!-- facebook -->
  <meta property="og:title" content="easyChik">
  <meta property="og:type" content="website" />
  <meta property="og:description" content="Système automatisé de Gestion des Etablissement Scolaires">
  <meta property="og:image" content="/public/assets/images/blogs/easychik/blog-banner.pngg">

  <title>easyChik | Blog | easyChik : Le système automatisé de Gestion des Etablissement Scolaires | easyChik </title>
  <link rel="shortcut icon" href="/public/assets/images/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="/public/assets/css/index.css" />
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "https://easychik.com",
      "name": "easyChik",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+243991097363",
        "contactType": "Customer service"
      }
    }
  </script>

  <meta name="twitter:image" content="/public/assets/images/blogs/easychik/blog-banner.png">
  <script defer src="/public/assets/js/app.js"></script>
  <script defer src="/public/assets/js/alpine.min.js"></script>
</head>

<body>
  <!-- ====== Navbar Section Start -->
  <header x-data="
        {
          navbarOpen: false,
        }
      " class="fixed bg-white left-0 top-0 z-50 w-full">
    <div class="container mx-auto">
      <div class="relative -mx-4 flex items-center justify-between">
        <div class="w-60 max-w-full px-4">
          <a href="/" class="block w-full py-5">
            <img src="/public/assets/images/logo/logo.png  " alt="logo" class="w-full" />
          </a>
        </div>
        <div class="flex w-full items-center justify-between px-4">
          <div>
            <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive'" id="navbarToggler" class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"></span>
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"></span>
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-body-color"></span>
            </button>
            <nav x-transition :class="!navbarOpen && 'hidden'" id="navbarCollapse" class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white py-5 px-6 shadow transition-all lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none">
              <ul class="block lg:flex">
                <li>
                  <a href="/" class="flex py-2 text-base font-medium text-dark hover:text-primary lg:ml-12 lg:inline-flex">
                    Acceuil
                  </a>
                </li>
                <li>
                  <a href="/#services" class="flex py-2 text-base font-medium text-dark hover:text-primary lg:ml-12 lg:inline-flex">
                    Fonctionalités
                  </a>
                </li>
                <li>
                  <a href="/#contacts" class="flex py-2 text-base font-medium text-dark hover:text-primary lg:ml-12 lg:inline-flex">
                    Contacts
                  </a>
                </li>
                <li>
                  <a href="#" class="flex py-2 text-base text-primary font-medium hover:text-primary lg:ml-12 lg:inline-flex text-primary">
                    Blog
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
            <!-- <a
                href="javascript:void(0)"
                class="py-3 px-7 text-base font-medium text-dark hover:text-primary"
              >
                Login
              </a> -->
            <a href="/partenariat" class="rounded-lg bg-primary py-3 px-7 text-base font-medium text-white hover:bg-opacity-90">
              Devenez Partenaire
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- ====== Navbar Section End -->

  <!-- ====== Breadcrumbs Section Start -->
  <section class="pt-20 lg:pt-[80px]">
    <div class="container mx-auto">
      <div class="mb-8 w-full">
        <div class="rounded-lg border border-light bg-[#f7f8fa] py-4 px-4 shadow-card sm:px-6 md:px-8 md:py-5">
          <ul class="flex items-center">
            <li class="flex items-center">
              <a href="/" class="flex items-center text-base font-semibold text-black hover:text-primary">
                <span class="pr-2">
                  <svg width="15" height="15" viewBox="0 0 15 15" class="fill-current">
                    <path d="M13.3503 14.6503H10.2162C9.51976 14.6503 8.93937 14.0697 8.93937 13.3729V10.8182C8.93937 10.5627 8.73043 10.3537 8.47505 10.3537H6.54816C6.29279 10.3537 6.08385 10.5627 6.08385 10.8182V13.3497C6.08385 14.0464 5.50346 14.627 4.80699 14.627H1.62646C0.929989 14.627 0.349599 14.0464 0.349599 13.3497V5.24431C0.349599 4.89594 0.535324 4.5708 0.837127 4.385L6.96604 0.506501C7.29106 0.297479 7.73216 0.297479 8.05717 0.506501L14.1861 4.385C14.4879 4.5708 14.6504 4.89594 14.6504 5.24431V13.3265C14.6504 14.0697 14.07 14.6503 13.3503 14.6503ZM6.52495 9.54086H8.45184C9.14831 9.54086 9.7287 10.1215 9.7287 10.8182V13.3497C9.7287 13.6052 9.93764 13.8142 10.193 13.8142H13.3503C13.6057 13.8142 13.8146 13.6052 13.8146 13.3497V5.26754C13.8146 5.19786 13.7682 5.12819 13.7218 5.08174L7.61608 1.20324C7.54643 1.15679 7.45357 1.15679 7.40714 1.20324L1.27822 5.08174C1.20858 5.12819 1.18536 5.19786 1.18536 5.26754V13.3729C1.18536 13.6284 1.3943 13.8374 1.64967 13.8374H4.80699C5.06236 13.8374 5.2713 13.6284 5.2713 13.3729V10.8182C5.24809 10.1215 5.82848 9.54086 6.52495 9.54086Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.51145 1.55106L13.465 5.33294V13.3497C13.465 13.412 13.4126 13.4644 13.3503 13.4644H10.193C10.1307 13.4644 10.0783 13.412 10.0783 13.3497V10.8182C10.0783 9.92832 9.34138 9.19112 8.45184 9.19112H6.52495C5.63986 9.19112 4.89529 9.92522 4.9217 10.8237V13.3729C4.9217 13.4352 4.86929 13.4877 4.80699 13.4877H1.64967C1.58738 13.4877 1.53496 13.4352 1.53496 13.3729V5.33311L7.51145 1.55106ZM1.27822 5.08174L7.40714 1.20324C7.45357 1.15679 7.54643 1.15679 7.61608 1.20324L13.7218 5.08174C13.7682 5.12819 13.8146 5.19786 13.8146 5.26754V13.3497C13.8146 13.6052 13.6057 13.8142 13.3503 13.8142H10.193C9.93764 13.8142 9.7287 13.6052 9.7287 13.3497V10.8182C9.7287 10.1215 9.14831 9.54086 8.45184 9.54086H6.52495C5.82848 9.54086 5.24809 10.1215 5.2713 10.8182V13.3729C5.2713 13.6284 5.06236 13.8374 4.80699 13.8374H1.64967C1.3943 13.8374 1.18536 13.6284 1.18536 13.3729V5.26754C1.18536 5.19786 1.20858 5.12819 1.27822 5.08174ZM13.3503 15H10.2162C9.32668 15 8.58977 14.2628 8.58977 13.3729V10.8182C8.58977 10.7559 8.53735 10.7035 8.47505 10.7035H6.54816C6.48587 10.7035 6.43345 10.7559 6.43345 10.8182V13.3497C6.43345 14.2396 5.69654 14.9768 4.80699 14.9768H1.62646C0.736911 14.9768 0 14.2396 0 13.3497V5.24431C0 4.77131 0.251303 4.33591 0.651944 4.08836L6.77814 0.211575C7.21781 -0.0705255 7.80541 -0.0705251 8.24508 0.211576C8.24546 0.211821 8.24584 0.212066 8.24622 0.212311L14.3713 4.08838C14.7853 4.34424 15 4.78759 15 5.24431V13.3265C15 14.2587 14.2671 15 13.3503 15ZM14.1861 4.385L8.05717 0.506501C7.73216 0.297479 7.29106 0.297479 6.96604 0.506501L0.837127 4.385C0.535324 4.5708 0.349599 4.89594 0.349599 5.24431V13.3497C0.349599 14.0464 0.929989 14.627 1.62646 14.627H4.80699C5.50346 14.627 6.08385 14.0464 6.08385 13.3497V10.8182C6.08385 10.5627 6.29279 10.3537 6.54816 10.3537H8.47505C8.73043 10.3537 8.93937 10.5627 8.93937 10.8182V13.3729C8.93937 14.0697 9.51976 14.6503 10.2162 14.6503H13.3503C14.07 14.6503 14.6504 14.0697 14.6504 13.3265V5.24431C14.6504 4.89594 14.4879 4.5708 14.1861 4.385Z" />
                  </svg>
                </span>
                Home
              </a>
              <span class="px-3 text-body-color">
                <svg width="7" height="12" viewBox="0 0 7 12" class="fill-current">
                  <path d="M0.879233 11.4351C0.808625 11.4351 0.720364 11.3998 0.667408 11.3469C0.543844 11.2233 0.543844 11.0291 0.649756 10.9056L5.09807 6.17483C5.18633 6.08657 5.18633 5.92771 5.09807 5.82179L0.649756 1.09105C0.526192 0.967487 0.543844 0.773315 0.667408 0.649751C0.790972 0.526187 0.985145 0.543839 1.10871 0.667403L5.55702 5.39815C5.85711 5.73353 5.85711 6.26309 5.55702 6.58083L1.10871 11.3292C1.0381 11.3998 0.967493 11.4351 0.879233 11.4351Z" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.229332 10.5281L4.48868 5.99831L0.24288 1.48294C-0.133119 1.09849 -0.0312785 0.549591 0.267983 0.25033C0.652758 -0.134445 1.2069 -0.0332381 1.50812 0.267982L1.52041 0.280272L5.9781 5.02138C6.46442 5.56491 6.47872 6.42661 5.96853 6.96778V6.96778L1.50834 11.7289C1.36051 11.8767 1.15353 12 0.879227 12C0.660517 12 0.428074 11.9064 0.267983 11.7463C-0.0719543 11.4064 -0.0699959 10.8773 0.220873 10.538L0.229332 10.5281ZM5.55702 6.58083C5.85711 6.26309 5.85711 5.73353 5.55702 5.39815L1.10871 0.667403C0.985145 0.543839 0.790972 0.526187 0.667408 0.649751C0.543844 0.773315 0.526192 0.967487 0.649756 1.09105L5.09807 5.82179C5.18633 5.92771 5.18633 6.08657 5.09807 6.17483L0.649756 10.9056C0.543844 11.0291 0.543844 11.2233 0.667408 11.3469C0.720364 11.3998 0.808625 11.4351 0.879233 11.4351C0.967493 11.4351 1.0381 11.3998 1.10871 11.3292L5.55702 6.58083Z" />
                </svg>
              </span>
            </li>
            <li class="flex items-center">
              <a href="/pages/blog" class="text-base font-semibold text-body-color hover:text-primary">
                Blog
              </a>
              <span class="px-3 text-body-color">
                <svg width="7" height="12" viewBox="0 0 7 12" class="fill-current">
                  <path d="M0.879233 11.4351C0.808625 11.4351 0.720364 11.3998 0.667408 11.3469C0.543844 11.2233 0.543844 11.0291 0.649756 10.9056L5.09807 6.17483C5.18633 6.08657 5.18633 5.92771 5.09807 5.82179L0.649756 1.09105C0.526192 0.967487 0.543844 0.773315 0.667408 0.649751C0.790972 0.526187 0.985145 0.543839 1.10871 0.667403L5.55702 5.39815C5.85711 5.73353 5.85711 6.26309 5.55702 6.58083L1.10871 11.3292C1.0381 11.3998 0.967493 11.4351 0.879233 11.4351Z" />
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.229332 10.5281L4.48868 5.99831L0.24288 1.48294C-0.133119 1.09849 -0.0312785 0.549591 0.267983 0.25033C0.652758 -0.134445 1.2069 -0.0332381 1.50812 0.267982L1.52041 0.280272L5.9781 5.02138C6.46442 5.56491 6.47872 6.42661 5.96853 6.96778V6.96778L1.50834 11.7289C1.36051 11.8767 1.15353 12 0.879227 12C0.660517 12 0.428074 11.9064 0.267983 11.7463C-0.0719543 11.4064 -0.0699959 10.8773 0.220873 10.538L0.229332 10.5281ZM5.55702 6.58083C5.85711 6.26309 5.85711 5.73353 5.55702 5.39815L1.10871 0.667403C0.985145 0.543839 0.790972 0.526187 0.667408 0.649751C0.543844 0.773315 0.526192 0.967487 0.649756 1.09105L5.09807 5.82179C5.18633 5.92771 5.18633 6.08657 5.09807 6.17483L0.649756 10.9056C0.543844 11.0291 0.543844 11.2233 0.667408 11.3469C0.720364 11.3998 0.808625 11.4351 0.879233 11.4351C0.967493 11.4351 1.0381 11.3998 1.10871 11.3292L5.55702 6.58083Z" />
                </svg>
              </span>
            </li>
            <li class="text-base font-semibold text-primary"><span class="font-bold">easyChik</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Breadcrumbs Section Start -->

  <!-- ====== Blog Details Section Start -->
  <section class="relative z-10 overflow-hidden bg-white pb-10 lg:pb-[80px]">
    <div class="container mx-auto flex w-full">
      <!-- <div class="mb-12 max-w-[570px] lg:mb-0">
                    <h2
                      class="mb-4 text-[32px] font-bold uppercase text-dark sm:text-[40px] lg:text-[36px] xl:text-[40px]"
                    >
                      easyChik : 
                    </h2--->
      <h2 class="mb-4 text-left text-[22px] font-bold text-dark sm:text-[32px] lg:text-[36px] xl:text-[40px]"><span class="font-bold">easyChik</span> : Le système automatisé de Gestion des Etablissement Scolaires</h2>
    </div>
    <div class="container mx-auto flex w-full justify-center">
      <!-- <div class="-mx-4 w-full flex flex-wrap justify-center"> -->
      <div class="-mx-4 sm:min-h-[400px] md:min-h-[500px] min-h-[200px] h-auto w-full lg:min-h-[700px] w-[900px flex flex-wrap justify-center">
        <div style=" background-image: url('/public/assets/images/blogs/easychik/blog-banner.png');" alt="logo" class="w-full h-full border rounded no-repeat bg-center bg-cover "> </div>
        <!-- </div> -->
      </div>
    </div>

    <div class="container mx-auto">
      <h1 class="font-bold py-4 text-3xl">Qu'est ce que easyChik ?</h1>
      <p class="py-4 text-justify "><span class="font-bold">easyChik</span> est un système conçu pour faciliter et optimiser la gestion des activités des Etablissements Scolaire.</p>
      <img src="/public/assets/images/blogs/easychik/login.png" alt="login" srcset="">
      <p class="py-4 text-justify "><span class="font-bold">easyChik</span> automatise les processus administratifs et la gestion des activités ce qui vous permet de gagner du temps et d'alléger la charge de travail tout en reduisant les erreurs humaines.</p>
      <img src="/public/assets/images/blogs/easychik/dash.png" alt="login" srcset="">
      <h1 class="font-bold py-4 text-3xl">Pourquoi easyChik ?</h1>
      <p class="py-4 text-justify ">Nous avons créé <span class="font-bold">easyChik</span> pour fournir une solution efficace résoudre les problèmes de gestion offrant aux établissements scolaires des outils dont ils ont besoin pour une gestion fluide et performante.</p>
      <h1 class="font-bold py-4 text-[32px]">Avantages : </h1>
      <p class="py-4 text-justify "><span class="font-bold">easyChik</span> vous permet de suivre en temps réel l'evolution des activités et des performances de l'établissement.</p>
      <img src="/public/assets/images/blogs/easychik/periode.png" alt="login" srcset="">
      <span class="text-primary italic text-center block p-4">Rapport Journalier sur la Perception des Frais Scolaire</span>
      <p class="py-4 text-justify "><span class="font-bold">easyChik</span> vous permet de reduire significativement les coûts dediés au fonctionnement de l'etablissement. Par l'automatisation de tâches administratives.
        <img src="/public/assets/images/blogs/easychik/bulletin.png" alt="login" srcset="">
        <span class="text-primary italic text-center block p-4">Calcul automatique et constitution des Bulletins Scolaire</span>
      <p class="py-4 text-justify "><span class="font-bold">easyChik</span> vous permet d'avoir facilement une vue d'ensemble des activités et des performances de l'établissement en temps réel.</p>
      </p>
    </div>
    <div class="container mx-auto mt-10">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <h3 class="mb-10 text-[26px] font-semibold text-dark">
            Fonctionalités Clés :
          </h3>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <div class="">
            <ol>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  1
                </span>
                Gestion des Eleves
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  2
                </span>
                Gestion des Cours
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  3
                </span>
                Gestion des Classes
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  4
                </span>
                Gestion des Fiches de Côtes
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  5
                </span>
                Calcul automatique des Bulletins
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  6
                </span>
                Gestion des Frais Scolaires
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  7
                </span>
                Gestion du Stock de Materiels
              </li>
            </ol>
          </div>
        </div>

        <div class="w-full px-4 lg:w-1/2">
          <div class="mb-12">
            <ol>

              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  8
                </span>
                Gestion des Horaires
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  9
                </span>
                Gestion des Employés
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  10
                </span>
                Communication avec les Parents
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  11
                </span>
                Gestion des Presences
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  12
                </span>
                Gestion des Fiches de Paie
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  13
                </span>
                Gestion des Evaluations
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 flex h-6 w-full max-w-[24px] items-center justify-center rounded-full bg-primary text-base text-white">
                  14
                </span>
                Gestion des Examens
              </li>
            </ol>
          </div>
        </div>
        <div class="conatiner mx-auto">
          <div class="lg:px-20 pb-10">
            <p class="p-10 border-l border-dark px-20 text-base font-medium italic text-body-color sm:text-lg">
              <span class="text-4xl font-bold">"</span>La numérisation des données vous aide à réduire les coûts en automatisant les tâches qui seraient autrement effectuées manuellement.
            </p>
          </div>
        </div>
        <div class="w-full px-4">
          <h3 class="mb-10 text-[26px] font-semibold text-dark">
            Fonctionnalités supplémentaires :
          </h3>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <div class="lg:mb-12">
            <ul>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 rounded-full text-base text-primary">
                  <svg width="20" height="20" viewBox="0 0 20 20" class="fill-current">
                    <path d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z" />
                    <path d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875Z" />
                  </svg>
                </span>
                Constitutions Automatique des Bulletins, Fiches de Paie et Rapports
              </li>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 rounded-full text-base text-primary">
                  <svg width="20" height="20" viewBox="0 0 20 20" class="fill-current">
                    <path d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z" />
                    <path d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875Z" />
                  </svg>
                </span>
                Impression Automatique des :
              </li>

              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Reçus de Paiements
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Rapports
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Bulletins
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Inventaires / Etats des Stocks
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Horaires
              </li>


              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 rounded-full text-base text-primary">
                  <svg width="20" height="20" viewBox="0 0 20 20" class="fill-current">
                    <path d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z" />
                    <path d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875Z" />
                  </svg>
                </span>
                Exportation sous Excel des :
              </li>

              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Rapports
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Inventaires / Etats des Stocks
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Listes des eleves
              </li>
            </ul>
          </div>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <div class="mb-12">
            <ul>
              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 rounded-full text-base text-primary">
                  <svg width="20" height="20" viewBox="0 0 20 20" class="fill-current">
                    <path d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z" />
                    <path d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875Z" />
                  </svg>
                </span>
                Constitution & Impression des :
              </li>

              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Cartes d'eleves
              </li>

              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Cartes de service
              </li>



              <li class="mb-4 flex text-base text-body-color">
                <span class="mr-2 rounded-full text-base text-primary">
                  <svg width="20" height="20" viewBox="0 0 20 20" class="fill-current">
                    <path d="M10 19.625C4.6875 19.625 0.40625 15.3125 0.40625 10C0.40625 4.6875 4.6875 0.40625 10 0.40625C15.3125 0.40625 19.625 4.6875 19.625 10C19.625 15.3125 15.3125 19.625 10 19.625ZM10 1.5C5.3125 1.5 1.5 5.3125 1.5 10C1.5 14.6875 5.3125 18.5312 10 18.5312C14.6875 18.5312 18.5312 14.6875 18.5312 10C18.5312 5.3125 14.6875 1.5 10 1.5Z" />
                    <path d="M8.9375 12.1875C8.71875 12.1875 8.53125 12.125 8.34375 11.9687L6.28125 9.96875C6.0625 9.75 6.0625 9.40625 6.28125 9.1875C6.5 8.96875 6.84375 8.96875 7.0625 9.1875L8.9375 11.0312L12.9375 7.15625C13.1563 6.9375 13.5 6.9375 13.7188 7.15625C13.9375 7.375 13.9375 7.71875 13.7188 7.9375L9.5625 12C9.34375 12.125 9.125 12.1875 8.9375 12.1875Z" />
                  </svg>
                </span>
                Messagerie en temps Reel avec les Parents d'élèves :
              </li>

              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Via le Système
              </li>

              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Par SMS
              </li>
              <li class=" ml-3 mb-4 flex text-base text-body-color">
                <span class="mr-2 flex items-center rounded-full text-base text-primary">
                  <svg width="20" height="8" viewBox="0 0 20 8" class="fill-current">
                    <path d="M19.2188 2.90626L17.0625 0.343758C16.875 0.125008 16.5312 0.0937583 16.2812 0.281258C16.0625 0.468758 16.0312 0.812508 16.2188 1.06251L18.25 3.46876H0.9375C0.625 3.46876 0.375 3.71876 0.375 4.03126C0.375 4.34376 0.625 4.59376 0.9375 4.59376H18.25L16.2188 7.00001C16.0312 7.21876 16.0625 7.56251 16.2812 7.78126C16.375 7.87501 16.5 7.90626 16.625 7.90626C16.7812 7.90626 16.9375 7.84376 17.0312 7.71876L19.1875 5.15626C19.75 4.46876 19.75 3.53126 19.2188 2.90626Z" />
                  </svg>
                </span>
                Par Mail
              </li>
            </ul>
          </div>
        </div>
        <div class="container mx-auto">

          <img src="/public/assets/images/blogs/easychik/eompte.png" alt="login" srcset="">
          <span class="text-primary italic text-center block p-4">Rapport sur le Paiements des Frais Scolaire et Etat de Compte (d'un eleve)</span>
          <img src="/public/assets/images/blogs/easychik/stocks.png" alt="login" srcset="">
          <span class="text-primary italic text-center block p-4">Rapport, Etat de Stock et Inventaire des Materiels.</span>
        </div>



      </div>
    </div>

    </div>
  </section>

  <!-- ====== Blog Details Section End -->
  <!-- ====== Call To Action Section Start -->
  <section class="py-20 lg:py-[120px]">
    <div class="container mx-auto">
      <div class="relative z-10 overflow-hidden rounded bg-primary py-12 px-8 md:p-[70px]">
        <div class="-mx-4 flex flex-wrap items-center">
          <div class="w-full px-4 lg:w-1/2">
            <span class="mb-2 text-base font-semibold text-white">
              Trouvez ici la solution pour votre Etablissement
            </span>
            <h2 class="mb-6 text-3xl font-bold leading-tight text-white sm:mb-8 sm:text-[38px] lg:mb-0">
              Obtenez <br class="hidden xs:block" />
              une Démonstration Gratuite
            </h2>
          </div>
          <div class="w-full px-4 lg:w-1/2">
            <div class="flex flex-wrap lg:justify-end">
              <!-- <a
                    href="javascript:void(0)"
                    class="my-1 mr-4 inline-block rounded bg-white bg-opacity-[15%] py-4 px-6 text-base font-medium text-white transition hover:bg-opacity-100 hover:text-primary md:px-9 lg:px-6 xl:px-9"
                  >
                    Devenez Partenaire
                  </a> -->
              <a href="/partenariat" class="my-1 inline-block rounded bg-[#13C296] py-4 px-6 text-base font-medium text-white transition hover:bg-opacity-90 md:px-9 lg:px-6 xl:px-9">
                Devenez Partenaire
              </a>
            </div>
          </div>
        </div>

        <div>
          <span class="absolute top-0 left-0 z-[-1]">
            <svg width="189" height="162" viewBox="0 0 189 162" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="16" cy="-16.5" rx="173" ry="178.5" transform="rotate(180 16 -16.5)" fill="url(#paint0_linear)" />
              <defs>
                <linearGradient id="paint0_linear" x1="-157" y1="-107.754" x2="98.5011" y2="-106.425" gradientUnits="userSpaceOnUse">
                  <stop stop-color="white" stop-opacity="0.07" />
                  <stop offset="1" stop-color="white" stop-opacity="0" />
                </linearGradient>
              </defs>
            </svg>
          </span>
          <span class="absolute bottom-0 right-0 z-[-1]">
            <svg width="191" height="208" viewBox="0 0 191 208" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse cx="173" cy="178.5" rx="173" ry="178.5" fill="url(#paint0_linear)" />
              <defs>
                <linearGradient id="paint0_linear" x1="-3.27832e-05" y1="87.2457" x2="255.501" y2="88.5747" gradientUnits="userSpaceOnUse">
                  <stop stop-color="white" stop-opacity="0.07" />
                  <stop offset="1" stop-color="white" stop-opacity="0" />
                </linearGradient>
              </defs>
            </svg>
          </span>
        </div>
      </div>
    </div>
  </section>
  <!-- ====== Call To Action Section End -->

  <?php
  Component::get('contact');
  Component::get('footer');
  ?>
</body>

</html>