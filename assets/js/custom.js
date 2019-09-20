if (typeof jQuery === 'undefined') {
  throw new Error('jQuery is required')
}

function titleCase(str){

	if( str == null ){
		return '';
	}else{
			str = str.toLowerCase().split(' ');

		let final = [ ];

	    for(let  word of str){
	      final.push(word.charAt(0).toUpperCase()+ word.slice(1));
	    }

	  return final.join(' ');

	}

}