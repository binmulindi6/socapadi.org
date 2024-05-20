<?php

namespace App\Model;

class Staff extends Model
{
    protected $table_name = 'staffs';
    protected $class_name = 'App\Model\Staff';


    public $user_id;
    public $title;
    public $content;

    public static function getStaff()
    {
        return [
            [
                'id' => 1,
                'cover' => "LUKENDOBONGA.jpg",
                'nom' => "Rev Lukendobonga Waenge Zabulon",
                'role' => "Membre co-fondateur et président du Conseil d’Administration",
                'resume' => "Rev Luk est licencié en Théologie Systématique à l’Université Evangélique en Afrique (UEA). Leader dévoué avec une passion pour le service communautaire et une profonde implication dans l’éducation et le développement des enfants. Servant en tant que Révérend Pasteur de l’Eglise Méthodiste Libre au Congo (Free Methodist Church in Congo) et Coordinateur National de International Child Care Ministries (ICCM-DRC), Il joue également un role essentiel en tant que membre du Conseil National et auditeur interne de l’organisation Empowering Lives International in DRC (ELI DRC), démontrant ainsi son engagement à créer un changement positif dans la communauté."
            ],
            [
                "id" => 2,
                "cover" => "elikana.jpg",
                "nom" => "Rev Mwendanababo Mkila Ma’Ano Elikana ",
                "role" => "Membre co-fondateur et vice- président du Conseil d’Administration",
                "resume" => "Rev Elikana est liciencié en Histoire à l’Université de Lubumbashi (UNILU) et Maitrise en Théologie Biblique à In His Name Bible College. Servant en tant que Représentant Légal et Vicaire Général de l’Eglise Anglicane Evangélico-Charismatique du Congo. Il est aussi le Sécrétaire Général Académique de l’Institut Supérieur Pédagogique (ISP- BARAKA).",
            ],
            [
                "id" => 3,
                "cover" => "sadiki.jpg",
                "nom" => "Prof Dr Sadiki Byombuka",
                "role" => "Membre co-fondateur et Administrateur",
                "resume" => "Prof Dr Sadiki est professeur d’universités et consultant en planification du développement et gestion de projet. Il a obtenu son doctorat en gestion de projet à l’université de Birmingham (UK) et Université Internationale de l’Atlantique (USA). Il fut membre du parlement en RDC. Il fut aussi le Représentant National de Tearfund UK en RDC.",
            ],
            [
                "id" => 4,
                "cover" => 'saidi.jpg',
                "nom" => "Saidi Alo-I-Bya-Sango",
                "role" => "Membre co-fondateur et chargé de control et relations publiques",
                "resume" => "Saidi est licencié en irénologie (Paxologie). Il est artisan de paix et expert en transformation des conflits : consultant au Rio. Il est également enseignant au Centre Universitaire de Paix (CUP).",
            ],
            [
                "id" => 5,
                "cover" => "moise.jpg",
                "nom" => "Lusambya Lukendo Moise",
                "role" => "Gérant",
                "resume" => "Moise est un jeune leader dynamique et entrepreneur prometteur, actuellement doctorant en Entrepreneuriat à l’Université de KwaZulu-Natal en Afrique du Sud. Fort d'un master dans le même domaine obtenu dans cette prestigieuse institution, il est passionné par l’entrepreneuriat (le développement des affaires) et la recherche. Il est enseignant à l’Institut Supérieur Pédagogie (ISP).",
            ],
            [
                "id" => 6,
                "cover" => "jeanpaul.jpg",
                "nom" => "Bya’Undaombe Longye Jean-Paul",
                "role" => "Ingénieur agronome et environnementaliste",
                "resume" => "Jean-Paul est Licencié en Agronomie à l’Université Evangélique en Afrique (UEA). En tant que jeune activiste et technicien spécialisé en changement climatique et environnement durable, son parcours remarquable se distingue par une contribution significative à la sensibilisation, à la recherche et à la mise en œuvre de solution durable pour la préservation des forets. Son engagement passionné atteste sa détermination à protéger notre planète (Ecosystème).",
            ],
            [
                "id" => 7,
                "cover" => "DANIEL.jpg",
                "nom" => "Daniel Byangene Gédéon",
                "role" => "Ingénieur agronome et vétérinaire",
                "resume" => "Daniel est master en agribusiness et management à l'Université Loyal du Congo (ULC). Passionné par le bien-être humain, animal et végétal, il possède des connaissances dans l’élaboration et gestions des projets agricoles avec de solides compétences en suiculture, cuniculture, myciculture, pisciculture, agroenvironnement, cultures maraichères et vivrières. Il est gestionnaire du laboratoire agricole et chef d’élevage du centre de recherche en agrumiculture (CERAGRU) en RDC.",
            ],
            [
                "id" => 8,
                "cover" => "Paul.jpg",
                "nom" => "Ikocha Lukendo Paul",
                "role" => "Ingénieur civil et environnementaliste",
                "resume" => "Paul est un Ingénieur Civil et Environnementaliste, diplômé de Uganda Christian University (UCU). En tant que co-fondateur et directeur des opérations d’Ecobuild Sarl, il promet la construction écologique en intégrant la durabilité au cœur des pratiques de construction. Son role à la SOCAPADI met en avant son engagement envers l’excellence en ingénierie et la protection de l’environnement.",
            ],
            [
                "id" => 9,
                "cover" => "zawadi.jpg",
                "nom" => "Zawadi Lwangila",
                "role" => "Secrétaire",
                "resume" => "Zawadi est graduée en informatique de gestion. Elle est enseignante à l’Institut Mgr Byaene à Bukavu.",
            ],
            [
                "id" => 10,
                "cover" => "mari.jpg",
                "nom" => "Mari Miga",
                "role" => "Animatrice",
                "resume" => "Mari est licenciée en santé et développement communautaire. Elle est agent de santé communautaire.",
            ],
            [
                "id" => 11,
                "cover" => "CHRISTELLE.jpg",
                "nom" => "Neema Bahati Christelle",
                "role" => "Animatrice",
                "resume" => "Christelle est licenciée en Santé Publique à l’Université Espoir d’Afrique au Burundi. Elle est passionnée par la santé publique et déterminée à contribuer positivement à l’amélioration des conditions de santé des populations.",
            ],

        ];
    }
}
