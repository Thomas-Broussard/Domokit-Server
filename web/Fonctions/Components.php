<?php


// Champs masqué
function HiddenField($name , $value){
    print('<input type="hidden" name="'.$name.'" value="'.$value.'"/>');
}

// Affichage d'un texte
function Text($id , $name , $value, $display){
    return
        '<input class="form-control" id="'.$id.'" name="'.$name.'" value="'.$value.'" type="text">'.$display.'</input>'
    ;
}

// Saisie utilisateur
function TextField($id , $name , $value, $display){
    return
        '<input class="form-control" id="'.$id.'" name="'.$name.'" value="'.$value.'" type="text">'.$display.'</input>'
    ;
}

// Saisie utilisateur
function MailField($id , $name , $value, $display){
    return
        '<input class="form-control" id="'.$id.'" name="'.$name.'" value="'.$value.'" type="mail">'.$display.'</input>'
    ;
}

// Saisie utilisateur
function PasswordField($id , $name , $value, $display){
    return
        '<input class="form-control" id="'.$id.'" name="'.$name.'" value="'.$value.'" type="password">'.$display.'</input>'
    ;
}

// Element d'une liste déroulante
function ListItem($value,$display,$selected){

    if($selected == true){
        print ("<option value=\"".$value."\" selected=\"selected\">".$display."</option>");
    }
    else{
        print ("<option value=\"".$value."\">".$display."</option>");
    }    
}

// Bouton générique ( bleu )
function Bouton($id,$name,$value,$display,$type,$icon){
    return '<button type="submit" id="'.$id.'" class="btn btn-'.$type.'" name="'.$name.'"; value="'.$value.'"> <i class="'.$icon.'"></i> '.$display.'</button>';
}

// Bouton primaire ( bleu )
function BoutonPrimary($id,$name,$value,$display,$icon){
    return
        '<button type="submit" id="'.$id.'" class="btn btn-primary btn-block" name="'.$name.'"; value="'.$value.'"> <i class="'.$icon.'"></i> '.$display.'</button>';
}

// Bouton d'action dangereuse ( rouge )
function BoutonDanger($id,$name,$value,$display,$icon){
    return '<button type="submit" id="'.$id.'" class="btn btn-danger btn-block" name="'.$name.'"; value="'.$value.'"> <i class="'.$icon.'"></i> '.$display.'</button>';
}

// Bouton d'action positive ( vert )
function BoutonSuccess($id,$name,$value,$display,$icon){
    return '<button type="submit" id="'.$id.'" class="btn btn-success btn-block" name="'.$name.'"; value="'.$value.'"> <i class="'.$icon.'"></i> '.$display.'</button>';
}


// Bouton générique avec ouverture d'une DialogBox
function BoutonDialogBox($id,$name,$value,$display,$type, $idDialog, $icon){
    return
        '<button type="submit" id="'.$id.'" class="btn btn-'.$type.'" name="'.$name.'"; value="'.$value.'" data-toggle="modal" data-target="#'.$idDialog.'"> <i class="'.$icon.'"></i> '.$display.'</button>';
}


// DialogBox ouverte par un bouton
function DialogBox($idDialog,$titre,$texte,$BoutonAnnuler,$BoutonConfirmer){
    return '
    <div class="modal fade" id="'.$idDialog.'" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">'.$titre.'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>
                        '.$texte.'
                    </p>
                </div>

                <div class="modal-footer">
                    '.$BoutonAnnuler.'
                    '.$BoutonConfirmer.'
                </div>
            </div>
        </div>
    </div>
    ';
}


?>