@extends('layouts.sidebar')
@section('content')

        <li class="menu-item m-1">
                <button  class="btn btn-link w-100" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1" >INFORMATIONS GÉNERALES</button>
                <div id="collapse1" class="collapse " aria-labelledby="heading1" data-parent="#accordion">
                  <div>
                    <span>Adresse : Institut Supérieur de Biotechnologie de Sfax (ISBS) Route Sokra km 4 - BP 1175 - 3038 Sfax Tunisie
                    </span>
                  </div>
                  <div>
                    <span>Télephone fixe: +216 74 674 354</span>
                  </div>
                  <div>
                    <span>Télephone mobile : +216 20 200 005</span>
                  </div>
                  <div>  
                    <span>Télephone fax: +216 74 674 364</span> 
                  </div>
                  <div>
                    <span>Email : medsalim.bouhlel@enis.rnu.tn</span> 
                  </div>
                </div>
            </li>
            <li class="menu-item m-1">
                  <span class="btn btn-info  w-100" onclick="document.getElementById('pres').visibility='hidden'">PRÉSENTATION</span>
                </a>
                      <div id='pres'>Crée en Janvier 2004, l´unité de recherche SETIT trouve ses origines au sein du laboratoire de recherche LETI de l´école Nationale d´Ingénieur de Sfax ENIS. Depuis sa création, l´unité SETIT est rattachée à l´Institut Supérieur de Biotechnologie de Sfax ISBS. Les thèmes de recherches de l´Unité SETIT sont centrés autour de l´analyse, le traitement, la sécurisation (cryptage et tatouage) la compression,la transmission des images ainsi que l'interaction Homme Machine. Nous essayons d'aborder ces thématiques en mélangeant une approche mathématique fortement algorithmique et une approche pratique basée sur les outils informatiques. Nous essayons dans le cadre des travaux de SETIT de prendre en compte les préoccupations médicaleset industrielles dans le choix des objectifs stratégiques de l´unité. Nos travaux se regroupent de façon naturelle autour des grands thèmes tel que: la Segmentation, le Tatouage, la Compression, la Crypto-Compression et la transmission. Il est cependant très important de noter que ce découpage ne partitionne nullement l'ensemble des recherches que nous entreprenons ni les chercheurs de l´unité. Au contraire, la plupart des membres de l'unité sont impliqués dans plusieurs thèmes. Il s'agit là d'une volonté claire d'avoir un réel fonctionnement en équipe qui ne peut qu'aboutir à l'élargissement des compétences de chacun. Nos thématiques sont en effet à la fois ciblées, car centrées sur un petit nombre d'objets combinatoires classiques, et ambitieux. En effet nous voulons étudier et évaluer ces objets sous de nombreux angles, ce qui fait que seul un véritable travail d'équipe nous permet d'être réellement efficace. Toutefois, il est impératif de signaler que notre objectif n'est pas de concevoir des méthodologies fondamentales, mais plutôt de rechercher les outils théoriques les mieux appropriés aux problèmes concrets posés par les "traiteurs de l´imagerie". Notre démarche relève donc d'une activité de recherche appliquée en développant différents outils, soit par nous-mêmes (comme les méthodes de tatouage et de crypto-compression), soit en évaluant les techniques existantes afin de pouvoir et les comprendre et les améliorer (comme la segmentation par les approches contour et région)et soit en appliquant notre savoir faire dans des thématiques diverses de la vie courante: médicale (Classification des mélanomes, détection des microcalcifications, ostéoporose, élaboration de système d´archivage et de transmission d´images médicales) et industrielle (contrأ´le de qualité, Télévidéo-surveillance, Sécurité de transmission..). Globalement, les compétences fondamentales requises touchent un grand nombre de secteurs relevant d'une part du traitement d'image et d'autre part du domaine médical et industriel. A toute fin utile nous signalons que le tatouage des images et la crypto-compression constituent deux axes ans lesquels nous nous distinguons à l´échelle mondiale par l´élaboration de nouvelles approches. D´ailleurs nous sommes les premiers en Tunisie à les traiter. A ce titre nous avons Plusieurs Brevets.</div>
  
            </li>
            <li class="menu-item m-1">
                  <span class="btn btn-info  w-100" data-toggle="dropdown">ACCUEIL</span>
                </a>
            </li>
            <li class="menu-item m-1">
                <span class="btn btn-info  w-100" data-toggle="dropdown">SERVICES</span>
              </a>
          </li>            
        </div>
        <div class="mt-2">
          <a href="formevent" role="button" class="btn btn-primary">Ajouter</a>
          </div>
@endsection