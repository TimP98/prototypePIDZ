
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pidz`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post_main`
--

CREATE TABLE `post_main` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_cat` varchar(30) NOT NULL,
  `post_vraag` varchar(250) NOT NULL,
  `post_antwoord` varchar(30) NOT NULL,
  `post_app` varchar(30) CHARACTER SET utf8 NOT NULL,
  `post_tijd` date NOT NULL,
  `post_link` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `post_main`
--

INSERT INTO `post_main` (`post_id`, `post_title`, `post_cat`, `post_vraag`, `post_antwoord`, `post_app`, `post_tijd`, `post_link`, `created_at`) VALUES
(22, 'Advies voor boekhoudprogramma.', 'programmas', 'Beste zzpers, even een vraag welk boekhoudprogramma gebruiken  jullie voor de gemaakte uren en  kilometers? Ik doe nu mijn uren en  kilometers bijhouden in een Excel bestand maar ik wil dit...', 'chat', '', '2020-05-15', 'ditiseenlink.nl', '2020-06-24 16:08:50'),
(24, 'Zorgprofessional gezocht', 'functie', 'Ik ben opzoek naar opdrachten in de regios Friesland, Drenthe,  Groningen en Noord Holland. Ik ben leerling verzorgende IG.  Ervaring in de gehandicaptenzorg, ouderenzorg, palliatieve en..', 'chat', '', '2020-05-12', 'ditiseenlink.nl', '2020-06-24 16:24:02'),
(25, 'Advies voor boekhoudprogramma.', 'programmas', 'Beste zzpers, even een vraag welk boekhoudprogramma gebruiken  jullie voor de gemaakte uren en  kilometers? Ik doe nu mijn uren en  kilometers bijhouden in een Excel bestand maar ik wil dit...', 'meeting', '', '2020-05-12', 'ditiseenlink.nl', '2020-06-24 16:25:45');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `post_main`
--
ALTER TABLE `post_main`
  ADD PRIMARY KEY (`post_id`) USING BTREE;

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `post_main`
--
ALTER TABLE `post_main`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
