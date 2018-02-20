
		function ChangeForm(Form_SID, ID, Book) {
			forms = document.getElementsByName(Form_SID);
			forms[0].form_text_1.value = ID;
			forms[0].form_text_2.value = Book;
			forms[0].submit();
			return false;
		}
