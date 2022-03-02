import { Component, OnInit } from '@angular/core';

import { FormBuilder, Validators } from '@angular/forms';
import { formatDate } from '@angular/common';
import { UserService } from 'src/app/shared/service/user.service';
import { ReservationService } from 'src/app/shared/service/reservation.service';
import { Reservation } from 'src/app/shared/model/reservation';
@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css'],
})
export class ReservationComponent implements OnInit {
  table_id!:string
  message!: string | undefined;
  reserved:boolean=false


  Auth!: boolean;
  book = this.fb.group({
    date: ['', [Validators.required]],
    start_time: ['', [Validators.required]],
    end_time: ['', [Validators.required]],
    comment: [''],
  });
  constructor(
    private fb: FormBuilder,
    private UserService: UserService,
    private ReservationService: ReservationService
  ) {}

  ngOnInit(): void {
    console.log(formatDate(new Date(), 'MM/dd/yyyy', 'en'));
  }
  onSubmit(reservation: any) {

    this.ReservationService.TableCheck(reservation.value).subscribe(
      (ResData) => {
        if(ResData.available==true){
          let reservationData = {
            start_time: reservation.value.start_time,
            end_time: reservation.value.end_time,
            date: reservation.value.date,
            comment: reservation.value.comment,
            table_id: ResData.table_id,
          };
          this.message="Yor table is reserved succsfully Go to Menu to Complete Reservation"
          this.ReservationService.ColectData(reservationData)
          this.book.reset()
          this.reserved=true
        }else{
          this.message="There Is No Empty tables please select Another date"
          this.reserved=false
        }
      },
      (error) => {
        console.log(error);
      }
    );
  }
}
