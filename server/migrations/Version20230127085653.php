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
        $this->addSql("insert into category (id, name) values (1, 'Frenos');");
        $this->addSql("insert into category (id, name) values (2, 'Motor');");
        $this->addSql("insert into category (id, name) values (3, 'Embrague');");
        $this->addSql("insert into category (id, name) values (4, 'Chasis');");
        $this->addSql("insert into category (id, name) values (5, 'Líquidos');");
        $this->addSql("insert into category (id, name) values (6, 'Neumáticos');");
        $this->addSql("insert into category (id, name) values (7, 'Llantas');");
        $this->addSql("insert into category (id, name) values (8, 'Aerodinámica');");
        $this->addSql("insert into category (id, name) values (9, 'Interior');");
        $this->addSql("insert into category (id, name) values (10, 'Chapa');");
        $this->addSql("insert into category (id, name) values (11, 'Electronica');");
        $this->addSql("insert into category (id, name) values (12, 'Luces');");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (1, 'Válvulas', '125', 'Descripción Corta', 'Descripción larga', 'https://www.actualidadmotor.com/wp-content/uploads/2021/05/valvulas-motor.jpg', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (2, 'Llantas 25 pulgadas', '400', 'Descripción Corta', 'Descripción larga', 'https://www.sport-tuning-shop.com/large/SPACWHEELS-ATLANTIC-i2716.jpg', 7)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (3, 'Alerón', '1000', 'Descripción Corta', 'Descripción larga', 'https://www.autohispania.com/product_thumb.php?img=images/productos/alern--zeus-pu-simoni-racing-1-5cb6e3f2b24cc.jpg&w=400&h=390', 8)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (4, 'Líquido de frenos', '20', 'Descripción Corta', 'Descripción larga', 'https://lubricantesweb.es/tienda/3055-thickbox_default/liquido-de-frenos-motul-dot-51-500ml.jpg', 5)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (5, 'Chasis Ford', '8000', 'Descripción Corta', 'Descripción larga', 'https://p.turbosquid.com/ts-thumb/6S/vDM0K1/bn/pickup_truck_chassis_4wd_ifs_render1/jpg/1605740207/600x600/fit_q87/27ab24e470de3027f10b8d6b4ab64491f963c732/pickup_truck_chassis_4wd_ifs_render1.jpg', 4)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (6, 'Embrague', '5000', 'Descripción Corta', 'Descripción larga', 'https://noticias.coches.com/wp-content/uploads/2018/11/embrague-2.jpg', 3)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (7, 'Pistones', '250', 'Descripción Corta', 'Descripción larga', 'https://www.motociclismo.es/uploads/s1/97/62/83/3/piston.jpeg', 2)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (8, 'Pastillas de freno', '120', 'Descripción Corta', 'Descripción larga', 'https://www.lubricantesenvenezuela.com/wp-content/uploads/2019/06/pastillas-freno.jpg', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (9, 'Discos de freno', '200', 'Descripción Corta', 'Descripción larga', 'https://www.brembo.com/es/PublishingImages/auto/primo-equipaggiamento/prodotti/dischi/COFUSO-FORI-3494-EST.jpg', 1)");

        $this->addSql("insert into repuesto (id, name, price, shortDescription, description, image, category_id) values (10, 'Retrovisor', '50', 'Descripción Corta', 'Descripción larga', 'https://cdn.euautoteile.de/uploads/custom-catalog/eu/categories/500x500/13104.png', 4)");

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
