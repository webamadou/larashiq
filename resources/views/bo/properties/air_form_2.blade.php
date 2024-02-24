<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('base_price', __('properties.base_price').' *')
			->id('base_price')
			->required()
			->type('number')
			->value(old('base_price', $pvm->property->base_price))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('commission_percentage', __('properties.commission_percentage'))
			->id('commission_percentage')
			->type('number')
			->value(old('commission_percentage', $pvm->property->commission_percentage))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('montant_syndic', __('properties.montant_syndic'))
			->id('montant_syndic')
			->type('number')
			->value(old('montant_syndic', $pvm->property->montant_syndic))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('deposit_percentage', __('properties.deposit_percentage'))
			->id('deposit_percentage')
			->type('number')
			->value(old('deposit_percentage', $pvm->property->deposit_percentage))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('vta_rate', __('properties.vta_rate'))
			->id('vta_rate')
			->type('number')
			->value(old('vta_rate', $pvm->property->vta_rate))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('property_tax', __('properties.property_tax'))
			->id('property_tax')
			->type('number')
			->value(old('property_tax', $pvm->property->property_tax))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('tom_tax_rate', __('properties.tom_tax_rate'))
			->id('tom_tax_rate')
			->type('number')
			->value(old('tom_tax_rate', $pvm->property->tom_tax_rate))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('additional_charges', __('properties.additional_charges'))
			->id('additional_charges')
			->type('number')
			->value(old('additional_charges', $pvm->property->additional_charges))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('tlv_tax_rate', __('properties.tlv_tax_rate'))
			->id('tlv_tax_rate')
			->type('number')
			->setAttribute('step', '0.01')
			->value(old('tlv_tax_rate', $pvm->property->tlv_tax_rate))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
	<div class="w-6/12 mx-2">
		{{ Aire::input('generate_total_cost', __('properties.generate_total_cost'))
			->id('generate_total_cost')
			->type('text')
			->disabled(false)
			->value(old('generate_total_cost', $pvm->property->generate_total_cost))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6 bg-immogray2')
			->setAttribute('step', '0.01')
		}}
	</div>
</div>
<div class="flex items-center justify-between w-100">
	<div class="w-6/12 mx-2">
		{{ Aire::input('commission_rate', __('properties.commission_rate'))
			->id('commission_rate')
			->type('number')
			->value(old('commission_rate', $pvm->property->commission_rate))
			->addClass('rounded-sm shadow-xs border-immogray2 col-6')
			->setAttribute('step', '0.01')
		}}
	</div>
	<div class="w-6/12 mx-2">

	</div>
</div>
@section('js_scripts')
    <script>
        const formInputs = document.querySelectorAll('input')
        const generate_total_cost = document.getElementById('generate_total_cost')

        const getPercentage = (percentValue, totalValue) => {
        if (percentValue === '' || ! percentValue || percentValue <= 0) {
        return 0;
        }
        // percentValue = percentValue !== '' ? parseFloat(percentValue) : 0;
        return Math.round((parseFloat(totalValue) * parseFloat(percentValue)) / 100);
        }

        const convertToFloat = (fieldValue) => {
        if (fieldValue === '' || ! fieldValue || fieldValue <= 0) {
        return 0
        }

        return parseFloat(fieldValue)
        };

        formInputs.forEach(input => {
            input.addEventListener('keyup', () => {
				// $property->base_price + ($property->base_price * tomRate%) + syndicAmount
                const base_price = convertToFloat(document.getElementById('base_price').value)
                // const commission_percentage = getPercentage(document.getElementById('commission_percentage').value, base_price)
                // const montant_syndic = getPercentage(document.getElementById('montant_syndic').value, base_price)
                const montant_syndic = convertToFloat(document.getElementById('montant_syndic').value)
                /* const vta_rate = getPercentage(document.getElementById('vta_rate').value, base_price)
                const property_tax = getPercentage(document.getElementById('property_tax').value, base_price) */
                const tom_tax_rate = getPercentage(document.getElementById('tom_tax_rate').value, base_price)
                /* const additional_charges = convertToFloat(document.getElementById('additional_charges').value)
                const tlv_tax_rate = getPercentage(document.getElementById('tlv_tax_rate').value, base_price)
                const deposit_percentage = getPercentage(document.getElementById('deposit_percentage').value,
                base_price)
                const commission_rate = getPercentage(document.getElementById('commission_rate').value, base_price) */

                /* generate_total_cost.value = base_price + commission_percentage + montant_syndic + vta_rate +
                property_tax + tom_tax_rate + additional_charges + tlv_tax_rate + commission_rate + deposit_percentage */

				generate_total_cost.value = Math.ceil(base_price+tom_tax_rate+montant_syndic)
            })
        });
    </script>
@endsection
