<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230127085653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // Create product <-- los insert
        $this->addSql("insert into category (id, name) values (1, 'Filtro de aceite');");
        $this->addSql("insert into category (id, name) values (2, 'Filtro de combustible');");
        $this->addSql("insert into category (id, name) values (3, 'Filtro de aire');");
        $this->addSql("insert into category (id, name) values (4, 'Filtro de polen');");
        $this->addSql("insert into category (id, name) values (5, 'Líquido de frenos');");
        $this->addSql("insert into category (id, name) values (6, 'Líquido anicongelante');");
        $this->addSql("insert into category (id, name) values (7, 'Líquido aire acondicionado');");
        $this->addSql("insert into category (id, name) values (8, 'Líquido de dirección');");
        $this->addSql("insert into category (id, name) values (9, 'Aceite');");
        $this->addSql("insert into category (id, name) values (10, 'Faros');");
        $this->addSql("insert into category (id, name) values (11, 'Batería');");
        $this->addSql("insert into category (id, name) values (12, 'Indicadores de dirección');");
        $this->addSql("insert into category (id, name) values (13, 'Alternadores');");
        $this->addSql("insert into category (id, name) values (14, 'Focos');");
        $this->addSql("insert into category (id, name) values (15, 'Cableado Eléctrico');");
        $this->addSql("insert into category (id, name) values (16, 'Cableado de Encendido');");
        $this->addSql("insert into category (id, name) values (17, 'Bujías');");
        $this->addSql("insert into category (id, name) values (18, 'Bobinas');");
        $this->addSql("insert into category (id, name) values (19, 'Supresores');");
        $this->addSql("insert into category (id, name) values (20, 'Calentadores');");
        $this->addSql("insert into category (id, name) values (21, 'Discos de Freno');");
        $this->addSql("insert into category (id, name) values (22, 'Pastillas de Freno');");
        $this->addSql("insert into category (id, name) values (23, 'Calipers');");
        $this->addSql("insert into category (id, name) values (24, 'Zapatas');");
        $this->addSql("insert into category (id, name) values (25, 'Pinzas de Freno');");
        $this->addSql("insert into category (id, name) values (26, 'Amortiguadores');");
        $this->addSql("insert into category (id, name) values (27, 'Resortes');");
        $this->addSql("insert into category (id, name) values (28, 'Trapecios');");
        $this->addSql("insert into category (id, name) values (29, 'Rótulas');");
        $this->addSql("insert into category (id, name) values (30, 'Neumáticos');");
        $this->addSql("insert into category (id, name) values (31, 'Llantas');");
        $this->addSql("insert into category (id, name) values (32, 'Cadenas');");
        $this->addSql("insert into category (id, name) values (33, 'Anillos');");
        $this->addSql("insert into category (id, name) values (34, 'Bielas');");
        $this->addSql("insert into category (id, name) values (35, 'Metales de bancada');");
        $this->addSql("insert into category (id, name) values (36, 'Gorros de válvulas');");
        $this->addSql("insert into category (id, name) values (37, 'Empaques');");
        $this->addSql("insert into category (id, name) values (38, 'Retenes');");
        $this->addSql("insert into category (id, name) values (39, 'Válvulas');");
        $this->addSql("insert into category (id, name) values (40, 'Bomba de agua');");
        $this->addSql("insert into category (id, name) values (41, 'Bomba de aceite');");
        $this->addSql("insert into category (id, name) values (42, 'Bomba de gasolina');");
        $this->addSql("insert into category (id, name) values (43, 'Ejes de levas');");
        $this->addSql("insert into category (id, name) values (44, 'Culata');");
        $this->addSql("insert into category (id, name) values (45, 'Cárter');");
        $this->addSql("insert into category (id, name) values (46, 'Cubre carter');");
        $this->addSql("insert into category (id, name) values (47, 'Pistones');");
        $this->addSql("insert into category (id, name) values (48, 'Turbina');");
        $this->addSql("insert into category (id, name) values (49, 'Eje');");
        $this->addSql("insert into category (id, name) values (50, 'Compresor');");
        $this->addSql("insert into category (id, name) values (51, 'Válvula de descarga');");
        $this->addSql("insert into category (id, name) values (52, 'Válvula de alivio');");
        $this->addSql("insert into category (id, name) values (53, 'Intercooler');");
        $this->addSql("insert into category (id, name) values (54, 'Capó');");
        $this->addSql("insert into category (id, name) values (55, 'Maletero');");
        $this->addSql("insert into category (id, name) values (56, 'Techo');");
        $this->addSql("insert into category (id, name) values (57, 'Paragolpes delantero');");
        $this->addSql("insert into category (id, name) values (58, 'Paragolpes Trasero');");
        $this->addSql("insert into category (id, name) values (59, 'Aleta delantera derecha');");
        $this->addSql("insert into category (id, name) values (60, 'Aleta delantera izquierda');");
        $this->addSql("insert into category (id, name) values (61, 'Aleta trasera derecha');");
        $this->addSql("insert into category (id, name) values (62, 'Aleta traseta izquierda');");
        $this->addSql("insert into category (id, name) values (63, 'Sensores de oxígeno');");
        $this->addSql("insert into category (id, name) values (64, 'Convertidor catalítico');");
        $this->addSql("insert into category (id, name) values (65, 'Silenciador');");
        $this->addSql("insert into category (id, name) values (66, 'Resonador');");
        $this->addSql("insert into category (id, name) values (67, 'Tubo de cola');");
        $this->addSql("insert into category (id, name) values (68, 'Luna delantera');");
        $this->addSql("insert into category (id, name) values (69, 'Luna trasera');");
        $this->addSql("insert into category (id, name) values (70, 'Ventanilla');");
        $this->addSql("insert into category (id, name) values (71, 'Retrovisor derecho');");
        $this->addSql("insert into category (id, name) values (72, 'Retrovisor izquierdo');");
        $this->addSql("insert into category (id, name) values (73, 'Retrovisor central');");
        $this->addSql("insert into category (id, name) values (74, 'Asientos traseros');");
        $this->addSql("insert into category (id, name) values (75, 'Asientos del piloto');");
        $this->addSql("insert into category (id, name) values (76, 'Asiento del copiloto');");
        $this->addSql("insert into category (id, name) values (77, 'Volante');");
        $this->addSql("insert into category (id, name) values (78, 'Palanca de cambios');");
        $this->addSql("insert into category (id, name) values (79, 'Radio');");
        $this->addSql("insert into category (id, name) values (80, 'Botones');");
        $this->addSql("insert into category (id, name) values (81, 'Parasoles');");
        $this->addSql("insert into category (id, name) values (82, 'Cuadro');");
        $this->addSql("insert into category (id, name) values (83, 'Climatizador');");
        $this->addSql("insert into category (id, name) values (84, 'Alerón delantero');");
        $this->addSql("insert into category (id, name) values (85, 'Alerón trasero');");
        $this->addSql("insert into category (id, name) values (86, 'Pasos de rueda');");
        $this->addSql("insert into category (id, name) values (87, 'Caja');");
        $this->addSql("insert into category (id, name) values (88, 'Palanca');");
        $this->addSql("insert into category (id, name) values (89, 'Piñones');");
        $this->addSql("insert into category (id, name) values (90, 'Ejes');");
        $this->addSql("insert into category (id, name) values (91, 'Selectores');");
        $this->addSql("insert into category (id, name) values (92, 'Embrague');");
        $this->addSql("insert into category (id, name) values (93, 'Otros');");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (1, 'Válvulas', '125', 'Volkswagen', 'Valvulas para un Volkswagen Golf', 'https://www.actualidadmotor.com/wp-content/uploads/2021/05/valvulas-motor.jpg', 51)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (2, 'Llantas 25 pulgadas', '400', 'Spacwheels', 'Llantas de 25 pulgadas de la marca Spacwheels', 'https://www.sport-tuning-shop.com/large/SPACWHEELS-ATLANTIC-i2716.jpg', 31)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (3, 'Alerón', '1000', 'Rocket Bunny', 'Alerón de la marca Rocket Bunny, conjunto de un kit aerodinámico', 'https://www.autohispania.com/product_thumb.php?img=images/productos/alern--zeus-pu-simoni-racing-1-5cb6e3f2b24cc.jpg&w=400&h=390', 85)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (4, 'Líquido de frenos', '20', 'Motul', 'Liquido de frenos de la marca Motul', 'https://lubricantesweb.es/tienda/3055-thickbox_default/liquido-de-frenos-motul-dot-51-500ml.jpg', 5)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (5, 'Chasis', '8000', 'Ford', 'Chasis de una camioneta Ford Raptor', 'https://p.turbosquid.com/ts-thumb/6S/vDM0K1/bn/pickup_truck_chassis_4wd_ifs_render1/jpg/1605740207/600x600/fit_q87/27ab24e470de3027f10b8d6b4ab64491f963c732/pickup_truck_chassis_4wd_ifs_render1.jpg', 93)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (6, 'Embrague', '5000', 'Mercedes', 'Embrague para un Mercedes AMG GT-R', 'https://noticias.coches.com/wp-content/uploads/2018/11/embrague-2.jpg', 92)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (7, 'Pistones', '250', 'Honda', 'Pistones para un Honda Civic', 'https://www.motociclismo.es/uploads/s1/97/62/83/3/piston.jpeg', 47)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (8, 'Pastillas de freno', '120', 'Brembo', 'Pastillas de freno universales de la marca Brembo', 'https://www.lubricantesenvenezuela.com/wp-content/uploads/2019/06/pastillas-freno.jpg', 22)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (9, 'Discos de freno', '200', 'Brembo', 'Disco de freno ventilado de alto rendimiento de la marca Brembo', 'https://www.brembo.com/es/PublishingImages/auto/primo-equipaggiamento/prodotti/dischi/COFUSO-FORI-3494-EST.jpg', 21)");

        $this->addSql("insert into repuesto (id, name, price, model, description, image, category_id) values (10, 'Retrovisor', '50', 'Ford', 'Retrovisor de un Ford Focus', 'https://cdn.euautoteile.de/uploads/custom-catalog/eu/categories/500x500/13104.png', 73)");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE repuesto DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON repuesto');
        $this->addSql('ALTER TABLE repuesto DROP category_id');
    }
}
