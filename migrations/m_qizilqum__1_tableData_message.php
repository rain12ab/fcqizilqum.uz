<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__1_tableData_message
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__1_tableData_message extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->_transaction = $this->getDb()->beginTransaction();
        $this->batchInsert('{{%message}}', 
            ['id', 'language', 'translation'],
            [
                [1, 'ru', 'Территориальное управления<br>по развитию туризма<br>Навоийской области'],
                [2, 'ru', 'Главная'],
                [3, 'ru', 'Законодательство'],
                [4, 'ru', 'Нормативные документы'],
                [5, 'ru', 'Государственные символы'],
                [6, 'ru', 'Новости'],
                [7, 'ru', 'Туристам'],
                [8, 'ru', 'Туристические места'],
                [9, 'ru', 'Гостиницы'],
                [10, 'ru', 'Объекты общественного питания'],
                [11, 'ru', 'Гиды'],
                [12, 'ru', 'Галерея'],
                [13, 'ru', 'Сейчас в Навои'],
                [14, 'ru', 'Ф.И.О.'],
                [15, 'ru', 'Поиск'],
                [16, 'ru', 'Языки'],
                [17, 'ru', 'Выбрать'],
                [18, 'ru', 'Государственные источники'],
                [19, 'ru', 'Контактная информация'],
                [20, 'ru', 'Все права защищены'],
                [21, 'ru', 'При использовании материалов ссылка на управление обязательна.'],
                [22, 'ru', 'Самые знаменитые места'],
                [23, 'ru', 'Последние новости'],
                [24, 'ru', 'Подробнее'],
                [25, 'ru', 'Опубликован'],
                [26, 'ru', 'Автор'],
                [27, 'ru', 'Последние нормативные документы'],
                [28, 'ru', 'Последнее фотособытие'],
                [29, 'ru', 'Если у вас возникнут вопросы, обращайтесь'],
                [30, 'ru', 'Номер телефона'],
                [31, 'ru', 'Сообщение'],
                [32, 'ru', 'Отправить'],
                [33, 'ru', 'База данных'],
                [34, 'ru', 'Тип документа'],
                [35, 'ru', 'Наша команда'],
                [36, 'ru', 'Контакты'],
                [37, 'ru', 'Тип гостиницы'],
                [38, 'ru', 'Поиск по названию гостиницы'],
                [39, 'ru', 'Тип'],
                [40, 'ru', 'Объекты общественного питания'],
                [41, 'ru', 'Выйти'],
                [42, 'ru', 'одна ночь'],
                [43, 'ru', 'сум'],
                [44, 'ru', 'Местоположение'],
                [45, 'ru', 'О нас'],
                [46, 'ru', 'Территориальное управление по развитию туризма Навоийской области'],
            ]
        );
        $this->_transaction->commit();

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        $this->_transaction->rollBack();

    }
}
