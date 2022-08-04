<?php

require 'Conexao.php';
require_once 'UtilDAO.php';

class smtpDAO extends Conexao{

    public function CadastrarSMTP($SMTPID,$SMTPHost, $SMTPPorta, $SMTPUser, $SMTPSenha){

        if (trim($SMTPHost)=="" || trim($SMTPPorta)=="" || trim($SMTPUser)=="" || trim($SMTPSenha)=="") {
            return 0;
        }

        $conexao = parent::retornaConexao();
        if ($SMTPID=='') {
            $comando_sql = ('Insert into tb_smtp (SMTPHost, SMTPPorta, SMTPUser, SMTPSenha) VALUES (?,?,?,?)');
            
        }else if ($SMTPID > 0) {
            $comando_sql = ('Update tb_smtp set SMTPHost = ?, SMTPPorta = ?, SMTPUser = ?, SMTPSenha = ? Where SMTPID = ?');

        }

        $sql = $conexao->prepare($comando_sql);
        $sql->bindValue(1,$SMTPHost);
        $sql->bindValue(2,$SMTPPorta);
        $sql->bindValue(3,$SMTPUser);
        $sql->bindValue(4,$SMTPSenha);
        
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
        
            return -1;
        }

    }

public function retornaSMTP(){

    $conexao = parent::retornaConexao();
    $comando_sql = ('Select SMTPID, SMTPHost, SMTPPorta, SMTPUser, SMTPSenha from tb_smtp');
    $sql = $conexao->prepare($comando_sql);
    $sql->execute();
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}
}
