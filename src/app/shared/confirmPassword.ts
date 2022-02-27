import { AbstractControl, ValidationErrors } from "@angular/forms";
export function confirmPassword1(controls:AbstractControl){
    const password=controls.get('password')!.value;
   const confirmPassword=controls.get('ConPass')!.value;
   return  !(password == confirmPassword) ? {misMatch:true}:false ; 
// if(password == confirmPassword){
//     return {misMatch:false}
// }
// else{
//     return {misMatch:true}
// }
   
}
// export function checkPasswords(group: AbstractControl):  ValidationErrors | null => { 
//     let pass = group.get('password').value;
//     let confirmPass = group.get('ConPass').value
//     return pass === confirmPass ? null : { notSame: true }
//   }
// export function ConfirmedValidator(controlName: string, matchingControlName: string){

//     return (formGroup: FormGroup) => {

//         const control = formGroup.controls[controlName];

//         const matchingControl = formGroup.controls[matchingControlName];

//         if (matchingControl.errors && !matchingControl.errors["confirmedValidator"]) {

//             return;

//         }

//         if (control.value !== matchingControl.value) {

//             matchingControl.setErrors({ confirmedValidator: true });

//         } else {

//             matchingControl.setErrors(null);

//         }

//     }

// }