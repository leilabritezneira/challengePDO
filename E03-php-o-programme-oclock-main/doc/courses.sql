SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `shortDescription` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `programContent` text DEFAULT NULL,
  `numberOfHours` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `price` float UNSIGNED NOT NULL DEFAULT 0,
  `classDate` varchar(100) DEFAULT NULL,
  `professor` varchar(100) DEFAULT NULL,
  `modality` varchar(30) DEFAULT NULL,
  `requiredLevel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `title`, `image`, `shortDescription`, `description`, `programContent`, `numberOfHours`, `price`, `classDate`, `professor`, `modality`, `requiredLevel`) VALUES
(1, 'Les bases de PHP', 'cours-php.jpg', 'Adapté aux débutants', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus lacus sit amet diam rhoncus, at congue magna maximus. Pellentesque ultrices vitae magna ut laoreet. Nunc ac sem faucibus, placerat justo sit amet, posuere quam.\n\nSuspendisse potenti. Ut sapien turpis, suscipit tristique enim sit amet, eleifend bibendum leo. Maecenas in quam sed nibh feugiat tristique a et lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '[\"Les variables\",\"Les conditions\",\"Les boucles\",\"Les tableaux\",\"Les classes\",\"Interaction avec une base de donn\\u00e9es\"]', 70, 790, '14/03/2022 au 18/03/2022', 'Nicolas R.', 'A distance', 'Débutant'),
(2, 'Gestion de projet', 'cours-gdp.jpg', 'Piloter des projets au quotidien', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus lacus sit amet diam rhoncus, at congue magna maximus. Pellentesque ultrices vitae magna ut laoreet. Nunc ac sem faucibus, placerat justo sit amet, posuere quam.\n\nSuspendisse potenti. Ut sapien turpis, suscipit tristique enim sit amet, eleifend bibendum leo. Maecenas in quam sed nibh feugiat tristique a et lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '[\"Cahier des charges\",\"Les m\\u00e9thodes des gestions de projets\",\"Les intervenants\",\"La communication\"]', 35, 490, 'sept 2022', 'Nicolas R.', 'A distance', 'Intermédiaire'),
(3, 'SEO', 'cours-seo.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus lacus sit amet diam rhoncus, at congue magna maximus. Pellentesque ultrices vitae magna ut laoreet. Nunc ac sem faucibus, placerat justo sit amet, posuere quam.\n\n    Suspendisse potenti. Ut sapien turpis, suscipit tristique enim sit amet, eleifend bibendum leo. Maecenas in quam sed nibh feugiat tristique a et lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '[\"R\\u00e9f\\u00e9rencement naturel vs. r\\u00e9f\\u00e9rencement payant\",\"Principe de base\",\"Optimisation de sa page\",\"Backlink\"]', 35, 490, 'juin 2023', 'Pierre C.', 'Présentiel', 'Débutant'),
(4, 'Community manager', 'cours-community-manager.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus lacus sit amet diam rhoncus, at congue magna maximus. Pellentesque ultrices vitae magna ut laoreet. Nunc ac sem faucibus, placerat justo sit amet, posuere quam.\n\n    Suspendisse potenti. Ut sapien turpis, suscipit tristique enim sit amet, eleifend bibendum leo. Maecenas in quam sed nibh feugiat tristique a et lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '[]', 60, 800, 'dec. 2022', 'Pierre C.', 'Présentiel', 'Débutant'),
(5, 'Administrateur système', 'cours-admin-systeme.jpg', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tempus lacus sit amet diam rhoncus, at congue magna maximus. Pellentesque ultrices vitae magna ut laoreet. Nunc ac sem faucibus, placerat justo sit amet, posuere quam.\n\n    Suspendisse potenti. Ut sapien turpis, suscipit tristique enim sit amet, eleifend bibendum leo. Maecenas in quam sed nibh feugiat tristique a et lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '[]', 120, 2900, 'nov. 2022', 'Nicolas R.', 'A distance et présentiel', 'Intermédiaire');

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;