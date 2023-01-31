import {
  Component,
  OnInit,
  AfterViewInit,
  OnDestroy,
  ViewChildren,
  ElementRef,
} from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  FormControl,
  FormArray,
  Validators,
  FormControlName,
} from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';

import { Repuesto } from '../../shared/repuesto';
import { RepuestoService } from '../../core/repuesto.service';

@Component({
  templateUrl: './repuesto-edit.component.html',
})
export class RepuestoEditComponent implements OnInit {
  pageTitle = 'Repuesto Edit';
  errorMessage: string = '';
  repuestoForm: any;

  prodId: number = 0;
  repuesto: Repuesto = {
    id: 0,
    title: '',
    price: 0,
    shortDescription: '',
    description: '',
    categories: [''],
    image: '',
  };

  constructor(
    private fb: FormBuilder,
    private activatedroute: ActivatedRoute,
    private router: Router,
    private repuestoService: RepuestoService
  ) {}

  ngOnInit(): void {
    this.repuestoForm = this.fb.group({
      title: [
        '',
        [
          Validators.required,
          Validators.minLength(3),
          Validators.maxLength(50),
        ],
      ],
      categories: '',
      price: '',
      description: '',
      shortDescription: '',
      image: '',
    });

    // Read the repuesto Id from the route parameter
    this.prodId = parseInt(this.activatedroute.snapshot.params['id']);
    this.getRepuesto(this.prodId);
  }

  getRepuesto(id: number): void {
    this.repuestoService.getRepuestoById(id).subscribe(
      (repuesto: Repuesto) => this.displayRepuesto(repuesto),
      (error: any) => (this.errorMessage = <any>error)
    );
  }

  displayRepuesto(repuesto: Repuesto): void {
    if (this.repuestoForm) {
      this.repuestoForm.reset();
    }
    this.repuesto = repuesto;
    this.pageTitle = `Edit Repuesto: ${this.repuesto.title}`;

    // Update the data on the form
    this.repuestoForm.patchValue({
      title: this.repuesto.title,
      price: this.repuesto.price,
      description: this.repuesto.description,
      shortDescription: this.repuesto.shortDescription,
      categories: this.repuesto.categories,
      image: this.repuesto.image,
    });
  }

  deleteRepuesto(): void {
    if (this.repuesto.id === 0) {
      // Don't delete, it was never saved.
      this.onSaveComplete();
    } else {
      if (confirm(`Really delete the repuesto: ${this.repuesto.title}?`)) {
        this.repuestoService.deleteRepuesto(this.repuesto.id).subscribe(
          () => this.onSaveComplete(),
          (error: any) => (this.errorMessage = <any>error)
        );
      }
    }
  }

  saveRepuesto(): void {
    if (this.repuestoForm.valid) {
      if (this.repuestoForm.dirty) {
        this.repuesto = this.repuestoForm.value;
        this.repuesto.id = this.prodId;

        this.repuestoService.updateRepuesto(this.repuesto).subscribe(
          () => this.onSaveComplete(),
          (error: any) => (this.errorMessage = <any>error)
        );
      } else {
        this.onSaveComplete();
      }
    } else {
      this.errorMessage = 'Please correct the validation errors.';
    }
  }

  onSaveComplete(): void {
    // Reset the form to clear the flags
    this.repuestoForm.reset();
    this.router.navigate(['']);
  }
}
