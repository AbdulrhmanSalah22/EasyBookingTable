import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ReservationService } from '../shared/service/reservation.service';

@Component({
  selector: 'app-user-reservation',
  templateUrl: './user-reservation.component.html',
  styleUrls: ['./user-reservation.component.css']
})
export class UserReservationComponent implements OnInit {
  data!:any
display=true;
  constructor(private ReservationService:ReservationService, private router:Router) { }

  ngOnInit(): void {
    this.ReservationService.GetUserReservation().subscribe((data:any)=>{
      // for(let i=1;i<3;i++){
        this.data=data.splice(1)
        console.log( this.data)

      // }
      if(data.length>0){
this.display=true;
      }
      else{
       this.display=false;
      }

    })
  }
 freg(reserve:string)
  {
    this.router.navigateByUrl('#'+reserve);
  }
}
