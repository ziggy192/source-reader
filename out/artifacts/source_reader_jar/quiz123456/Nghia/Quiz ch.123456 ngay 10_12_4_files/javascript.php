M.core_question_flags={flagattributes:null,actionurl:null,flagtext:null,listeners:[],init:function(Y,actionurl,flagattributes,flagtext){M.core_question_flags.flagattributes=flagattributes;M.core_question_flags.actionurl=actionurl;M.core_question_flags.flagtext=flagtext;Y.all('div.questionflag').each(function(flagdiv,i){var checkbox=flagdiv.one('input[type=checkbox]');if(!checkbox)return;var input=Y.Node.create('<input type="hidden" class="questionflagvalue" />');input.set('id',checkbox.get('id'));input.set('name',checkbox.get('name'));input.set('value',checkbox.get('checked')?1:0);var image=Y.Node.create('<input type="image" class="questionflagimage" />'),flagtext=Y.Node.create('<span class="questionflagtext">.</span>');M.core_question_flags.update_flag(input,image,flagtext);checkbox.remove();flagdiv.one('label').remove();flagdiv.append(input);flagdiv.append(image);flagdiv.append(flagtext)});Y.delegate('click',function(e){var input=this.one('input.questionflagvalue');input.set('value',1-input.get('value'));M.core_question_flags.update_flag(input,this.one('input.questionflagimage'),this.one('span.questionflagtext'));var postdata=this.one('input.questionflagpostdata').get('value')+input.get('value');e.halt();Y.io(M.core_question_flags.actionurl,{method:'POST',data:postdata});M.core_question_flags.fire_listeners(postdata)},document.body,'div.questionflag')},update_flag:function(input,image,flagtext){var value=input.get('value');image.setAttrs(M.core_question_flags.flagattributes[value]);flagtext.replaceChild(flagtext.create(M.core_question_flags.flagtext[value]),flagtext.get('firstChild'));flagtext.set('title',M.core_question_flags.flagattributes[value].title)},add_listener:function(listener){M.core_question_flags.listeners.push(listener)},fire_listeners:function(postdata){for(var i=0;i<M.core_question_flags.listeners.length;i++)M.core_question_flags.listeners[i](postdata.match(/\bqubaid=(\d+)\b/)[1],postdata.match(/\bslot=(\d+)\b/)[1],postdata.match(/\bnewstate=(\d+)\b/)[1])}}