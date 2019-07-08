<?php

use hzhihua\dump\Migration;

/**
 * Class m_qizilqum__2_key_team
 * @property \yii\db\Transaction $_transaction
 * @Github https://github.com/Hzhihua
 */
class m_qizilqum__2_key_team extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        
        $this->runSuccess['PRIMARY'] = $this->addPrimaryKey(null, '{{%team}}', 'id');
        $this->runSuccess['addAutoIncrement'] = $this->addAutoIncrement('{{%team}}', 'id', 'integer', '', 0);

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        
        foreach ($this->runSuccess as $keyName => $value) {
            if ('addAutoIncrement' === $keyName) {
                continue;
            } elseif ('PRIMARY' === $keyName) {
                // must be remove auto_increment before drop primary key
                if (isset($this->runSuccess['addAutoIncrement'])) {
                    $value = $this->runSuccess['addAutoIncrement'];
                    $this->dropAutoIncrement("{$value['table_name']}", $value['column_name'], $value['column_type'], $value['property']);
                }
                $this->dropPrimaryKey(null, '{{%team}}');
            } elseif (!empty($keyName)) {
                $this->dropIndex("`$keyName`", '{{%team}}');
            }
        }

    }
}
